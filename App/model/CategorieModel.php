<?php
// require_once(__DIR__ . '/../core/Database_connexion.php');

class CategorieModel {
    private $pdo;
    public function __construct() {
        $this->pdo = (new Data())->connection();

    }

    public function addCategorie($categorie) {
        $query = 'INSERT INTO categories(name) VALUES(:categorie)';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    public function getCategories() {
        $query = 'SELECT * FROM categories';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCategory($categoryId) {
        $query = "DELETE FROM categories WHERE id = :categoryId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
