<?php

// require_once(__DIR__ . '/../core/Database_connexion.php');
class User {
    private $pdo;
    public function __construct() {
        $this->pdo = (new Data())->connection();

    }

    public function createUser($data) {
        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO users (Last_name, First_name, email, password, avatar, status) 
                  VALUES (:Last_name, :First_name, :email, :password, :avatar, :status)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':Last_name', $data['Last_name']);
        $stmt->bindParam(':First_name', $data['First_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':avatar', $data['avatar']);
        $stmt->bindParam(':status', $data['status']);
        if ($stmt->execute()) {
            return  $this->pdo->lastInsertId();
        } else {
            return false; 
        }
       
    }

    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfile($userId) {
        $query = "SELECT * FROM users WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUserRole($userId, $role) {
        $pdo = $this->pdo; 
        $stmt = $pdo->prepare("UPDATE users SET role = :role WHERE id = :id");
        return $stmt->execute([':role' => $role, ':id' => $userId]);
    }
    
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
