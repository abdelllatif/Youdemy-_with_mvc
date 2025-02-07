<?php
// require_once(__DIR__ . '/../model/User.php');
// require_once(__DIR__ . '/../core/Database_connexion.php');

class AdminModel extends User {
    private $pdo;

    public function __construct() {
        $this->pdo = (new Data())->connection();

    }

    public function validateTeacherAccount($teacherId, $isApproved) {
        try {
            $status = $isApproved ? 'approved' : 'rejected';
            $query = "UPDATE users SET is_approved = :status WHERE id = :teacherId AND role = 'teacher'";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":teacherId", $teacherId);
            
            if ($stmt->execute()) {
                return [
                    'success' => true,
                    'message' => 'Teacher account validated successfully'
                ];
            }
            return [
                'success' => false,
                'message' => 'Failed to validate teacher account'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function getTeachers() {
        try {
            $query = "SELECT * FROM users WHERE role = 'teacher' ORDER BY created_at DESC";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function suspendUser($userId, $status) {
        try {
            $newStatus = $status == 0 ? 'suspended' : 'active';
            $query = "UPDATE users SET status = :status WHERE id = :userId";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":status", $newStatus);
            $stmt->bindParam(":userId", $userId);
            
            if ($stmt->execute()) {
                return [
                    'success' => true,
                    'message' => 'User status updated successfully'
                ];
            }
            return [
                'success' => false,
                'message' => 'Failed to update user status'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function getUserStatus($userId) {
        try {
            $query = "SELECT id, first_name, last_name, email, status, role FROM users WHERE id = :userId";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":userId", $userId);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return [
                    'success' => true,
                    'data' => $stmt->fetch(PDO::FETCH_ASSOC)
                ];
            }
            return [
                'success' => false,
                'message' => 'User not found'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function getAllUsersByStatus($status = null) {
        try {
            if ($status) {
                $query = "SELECT id, first_name, last_name, email, role, status, created_at 
                          FROM users 
                          WHERE status = :status AND role != 'admin'
                          ORDER BY created_at DESC";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(":status", $status);
            } else {
                $query = "SELECT id, first_name, last_name, email, role, status, created_at 
                          FROM users 
                          WHERE role != 'admin'
                          ORDER BY created_at DESC";
                $stmt = $this->pdo->prepare($query);
            }
            $stmt->execute();
            return [
                'success' => true,
                'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function getTotalVideos() {
        $query = "SELECT COUNT(*) as total_videos FROM videos";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_videos'];
    }

    public function getTotalDocuments() {
        $query = "SELECT COUNT(*) as total_documents FROM document";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_documents'];
    }

    public function getCoursesByCategory() {
        $query = "
            SELECT c.name as category, COUNT(vc.video_id) + COUNT(dc.document_id) as total_courses
            FROM categories c
            LEFT JOIN video_categories vc ON c.id = vc.category_id
            LEFT JOIN document_categories dc ON c.id = dc.category_id
            GROUP BY c.name
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopCourse() {
        $query = "
            SELECT title, student_count FROM (
                SELECT v.title as title, COUNT(e.id) as student_count
                FROM videos v
                JOIN video_enrollments e ON v.id = e.video_id
                GROUP BY v.id
                UNION ALL
                SELECT d.title as title, COUNT(e.id) as student_count
                FROM document d
                JOIN document_enrollments e ON d.id = e.document_id
                GROUP BY d.id
            ) as combined_courses
            ORDER BY student_count DESC
            LIMIT 1
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTopTeachers() {
        $query = "
            SELECT u.first_name, u.last_name, COUNT(v.id) + COUNT(d.id) as course_count
            FROM users u
            LEFT JOIN videos v ON u.id = v.teacher_id
            LEFT JOIN document d ON u.id = d.teacher_id
            WHERE u.role = 'teacher'
            GROUP BY u.id
            ORDER BY course_count DESC
            LIMIT 3
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function suspendCourse($courseId, $type, $role) {
        if ($type === 'video') {
            $query = "SELECT status FROM videos WHERE id = :courseId";
        } else if ($type === 'document') {
            $query = "SELECT status FROM document WHERE id = :courseId";
        }
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->execute();
        $course = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($course['status'] === 'active') {
            $newStatus = 'suspended';
        } elseif ($course['status'] === 'suspended') {
            $newStatus = 'active';
        }

        if ($type === 'video') {
            $query = "UPDATE videos SET status = :status, suspended_by = :role WHERE id = :courseId";
        } else if ($type === 'document') {
            $query = "UPDATE document SET status = :status, suspended_by = :role WHERE id = :courseId";
        }

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':status', $newStatus);
        $stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}