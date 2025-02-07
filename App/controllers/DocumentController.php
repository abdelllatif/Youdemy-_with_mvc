<?php


class DocumentController extends CourseController {

    public function __construct() {
        parent::__construct(new DocumentModel()); 
    }

    public function addDocument() {     
        if (isset($_FILES['document']) && $_FILES['document']['error'] === 0) {
            $documentFile = $_FILES['document'];
    
            if ($this->isValidFile($documentFile, ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'], 10 * 1024 * 1024)) {
                if (isset($_SESSION['user']['id'])) {
                    $documentPath = $this->uploadFile($documentFile);
    
                    if ($documentPath) { 
                        $data = [
                            'title' => $_POST['title'] ?? '',
                            'categorie_id' => $_POST['categorie'] ?? null,
                            'description' => $_POST['description'] ?? '',
                            'teacher_id' => $_SESSION['user']['id'],
                            'type' => $documentFile['type'], 
                        ];
    
                        return $this->model->add($data, $documentPath);
                    } else {
                        echo 'Failed to upload the document';
                    }
                } else {
                    echo 'User not logged in';
                }
            } else {
                echo 'Invalid file type or size';
            }
        } else {
            echo 'No file uploaded';
        }
        
        require_once(__DIR__ . '/../views/Teacher/teacher_profil.php');
    }
    

    private function isValidFile($file, $validTypes, $maxSize) {
        if (!in_array($file['type'], $validTypes)) {
            return false;
        }
        if ($file['size'] > $maxSize) {
            return false;
        }
        return true;
    }

    private function uploadFile($file) {
        $targetDirectory = $_SERVER['DOCUMENT_ROOT'] . '/uploads/documents/';
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        $targetPath = $targetDirectory . uniqid() . '-' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        }
        return false;
    }
    public function afficher( $term = null, $page = 1, $perPage = 10) {
        $term = $_POST['term'] ?? null;
        $results = $this->model->afficher('document', $term, $page, $perPage);
        require_once(__DIR__ . '/../views/Student/course.php');
        return $results;
    }
}
