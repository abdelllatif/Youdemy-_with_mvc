
<?php 
class DocumentModel extends CourseModel{
    private $pdo;
    protected $table = 'documents';
    public function __construct() {
        $this->pdo = (new Data())->connection();
    }

    public function add($data, $documentPath) {
        $sql = "INSERT INTO documents (title, description, document_path,teacher_id,type,categorie_id) VALUES (:title, :description, :document_path,:teacher_id,:type,:categorie_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':teacher_id', $data['teacher_id']);   
        $stmt->bindParam(':categorie_id', $data['categorie_id']);
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':document_path', $documentPath);

        if ($stmt->execute()) {
            return ['success' => 'Document uploaded successfully'];
        } else {
            return ['error' => 'Failed to insert document data into the database'];
        }
    }
    
    public function getAll() {
        $query = "SELECT * FROM documents";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

