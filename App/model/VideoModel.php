<?php

class VideoModel extends CourseModel {
    private $pdo;
    protected $table = 'videos';
    public function __construct() {
        $this->pdo = (new Data())->connection();
    }

    public function add($data, $videoPath, $thumbnailPath) {
        $sql = "INSERT INTO videos (title,description ,teacher_id, video_path, thumbnail_path,categorie_id) VALUES (:title, :description,:teacher_id,  :video_path, :thumbnail_path,:categorie_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':teacher_id', $data['teacher_id']);
        $stmt->bindParam(':categorie_id', $data['categorie_id']);
        $stmt->bindParam(':video_path', $videoPath);
        $stmt->bindParam(':thumbnail_path', $thumbnailPath);
        
        if ($stmt->execute()) {
            return $this->pdo->lastInsertId(); 
        } else {
            return false;
        }
    }
    public function addTagsTocourse($tags,$video_id) {
        $query = "INSERT INTO video_tags (video_id, tag_id) VALUES (:video_id, :tag_id)";
        $stmt = $this->pdo->prepare($query);
        try {
            if (is_array($tags)) {
                foreach ($tags as $tagId) {
                    $stmt->execute([
                        ":video_id" => $video_id,
                        ':tag_id' => $tagId
                    ]);
                }
            } else {
                $stmt->execute([
                    ":video_id" => $video_id,
                    ':tag_id' => $tags
                ]);
            }
            return true;
        } catch (PDOException $e) {
            echo "Error adding tags: " . $e->getMessage();
            return false;
        }
    }
public function afficher($term = null, $page = 1, $perPage = 10) {
    $offset = max(0, ($page - 1) * $perPage); // Ensure OFFSET is not negative

    $query = "
        SELECT 
            v.id AS video_id,
            v.title AS video_title,
            v.thumbnail_path,
            c.name AS categorie,
            STRING_AGG(DISTINCT t.name, ', ') AS tags,  -- Ensure this matches your database
            u.first_name AS teacher_first_name,
            u.last_name AS teacher_last_name,
            u.avatar AS avatar
        FROM videos v
        LEFT JOIN video_tags vt ON v.id = vt.video_id
        LEFT JOIN tags t ON vt.tag_id = t.id
        LEFT JOIN users u ON v.teacher_id = u.id
        LEFT JOIN categories c ON v.categorie_id = c.id
    ";

    if ($term) {
        $query .= " WHERE v.title LIKE :term OR t.name LIKE :term"; // Change t.name to t.tag_name if needed
    }

    $query .= " 
        GROUP BY v.id, v.title, v.thumbnail_path, c.name, u.avatar, u.first_name, u.last_name
        ORDER BY v.id DESC
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $this->pdo->prepare($query);

    if ($term) {
        $termParam = "%$term%";
        $stmt->bindValue(':term', $termParam, PDO::PARAM_STR);
    }

    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
    
public function countResults($term = null) {
    $query = "SELECT COUNT(DISTINCT v.id) AS total FROM videos v 
              LEFT JOIN video_tags vt ON v.id = vt.video_id
              LEFT JOIN tags t ON vt.tag_id = t.id";
    
    if ($term) {
        $query .= " WHERE v.title LIKE :term OR v.description LIKE :term"; // Ensure 'description' is spelled correctly
    }
    
    $stmt = $this->pdo->prepare($query);
    
    if ($term) {
        $termParam = "%$term%";
        $stmt->bindParam(':term', $termParam, PDO::PARAM_STR); // Specify the parameter type
    }
    
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
    
    public function getAll() {
        $query = "SELECT * FROM videos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
