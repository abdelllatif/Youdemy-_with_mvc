<?php

class TagModel {
    protected $pdo;

    public function __construct() {
        $this->pdo = (new Data())->connection();

    }

    public function createTag($tag) {
        $query = 'INSERT INTO tags(name) VALUES(:tag)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':tag', $tag); 
        
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => 'Tag added successfully.'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Error adding tag: ' . implode(", ", $stmt->errorInfo())
            ];
        }
    }

    public function getAllTags() {
        $query = 'SELECT * FROM tags';
        $stmt = $this->pdo->prepare($query);
        
        if ($stmt->execute()) {
            return [
                'success' => true,
                'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Error fetching tags: ' . implode(", ", $stmt->errorInfo())
            ];
        }
    }

    public function deleteTag($tagId) {
        $query = "DELETE FROM tags WHERE id = :tagId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => 'Tag deleted successfully.'
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Error deleting tag: ' . implode(", ", $stmt->errorInfo())
            ];
        }
    }
}