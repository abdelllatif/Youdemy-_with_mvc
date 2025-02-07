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
    public function affichers($term = null, $page = 1, $perPage = 10) {
        // if (!$this->pdo) {
        //     echo "PDO connection is not available.";
        
        // }

        $offset = ($page - 1) * $perPage;
        echo $this->table;
        if ($term) {
            $query = "SELECT * FROM videos v WHERE title LIKE :term OR description LIKE :term LIMIT :limit OFFSET :offset inner join videos_tag vt  on v.id= vt.vedio_id  ";
            
            $stmt = $this->pdo->prepare($query);
            $term = "%$term%";
            $stmt->bindParam(':term', $term);
            $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        } else {
            $query = "SELECT * FROM videos LIMIT :limit OFFSET :offset";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll() {
        $query = "SELECT * FROM videos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
