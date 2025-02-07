<?php
// require_once (__DIR__.'/../model/CategorieModel.php');
class CategorieController {
    private $categorieModel;

    public function __construct() {
        $this->categorieModel = new CategorieModel();
    }

    public function addCategorie() {
        if (!isset($_POST['categorie']) || empty($_POST['categorie'])) {
            echo "No categorie provided.";
            return;
        }
    
        $categories = $_POST['categorie'];
        $success = true;
    
        foreach ($categories as $categorie) {
            if (!$this->categorieModel->addCategorie($categorie)) {
                $success = false;
            }
        }
        if ($success) {
            header('Location: ?route=admin/dashboard');
            exit(); 
        } else {
            echo 'Failed to create categorie.';
        }
        require_once(__DIR__.'/../views/Admin/admin_dachebored.php');
    }

    public function showCategories() {
        $categories = $this->categorieModel->getCategories();
        
        echo json_encode($categories); 
    }

    public function deleteCategorie($categoryId) {
        if ($this->categorieModel->deleteCategory($categoryId)) {
            echo "Category deleted successfully.";
        } else {
            echo "Error deleting category.";
        }
    }
}
?>
