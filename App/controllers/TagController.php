<?php
require_once (__DIR__.'/../model/TagModel.php');

class TagController{
    private $tagModel;

    public function __construct() {
        $this->tagModel = new TagModel();
    }

    public function createTag() {
        if (!isset($_POST['tags']) || empty($_POST['tags'])) {
            echo "No tags provided.";
            return;
        }
    
        $tags = $_POST['tags'];
        $success = true;
    
        foreach ($tags as $tag) {
            if (!$this->tagModel->createTag($tag)) {
                $success = false;
            }
        }
    
        if ($success) {
            header('Location: ?route=admin/dashboard');
            exit(); 
        } else {
            echo 'Failed to create tags.';
        }
        require_once(__DIR__.'/../views/Admin/admin_dachebored.php');
    }

    public function getAllTags() {
        $result = $this->tagModel->getAllTags(); 
    
        if ($result['success']) { 
            $tags = $result['data']; 
        } else {
            $tags = []; 
        }
    
        header('Content-Type: application/json');
        echo json_encode($tags);
        exit; 
    }    
    public function deleteTag($tagId) {
        return $this->tagModel->deleteTag($tagId);
    }
}