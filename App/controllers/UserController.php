<?php
require_once(__DIR__ . '/../model/User.php');

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'Last_name'   => $_POST['Last_name'],
                'First_name'  => $_POST['First_name'],
                'email'       => $_POST['email'],
                'password'    => $_POST['password'],
                'avatar' => '../App/views/Uploads/avatar/default_avatar.jpg',
                'status'      => 'active'
            ];
            $userId =$this->userModel->createUser($data) ;
               if ($userId) {
                $_SESSION['user']=[
                    'id'=>$userId
                ];
                header("Location: ?route=authentification/choose_role");
                exit(); 
            } else {
                echo "User registration failed.";
            }
        }
    
        require_once (__DIR__.'/../views/authentification/login.php');
    }

    public function chooseRole() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['role'];
            $userId = $_SESSION['user']['id'];     
            $_SESSION['user'] = [
                'role'  => $role
            ];
            if ($this->userModel->updateUserRole($userId, $role)) {
                header("location: ?route=authentification/login");
            }else {
                echo "echek u cant shose role.";
            }
        }
            require_once (__DIR__.'/../views/authentification/chose_role.php');
    
}
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id'    => $user['id'],
                    'role'  => $user['role'],
                    'email' => $user['email']
                ];
                if ($user['role'] === 'teacher') {
                    header("Location: ?route=teacher/dashboard ");
                } elseif ($user['role'] === 'student') {
                    header("Location: ?route=student/dashboard");
                }
                elseif ($user['role'] === 'admin') {
                    header("Location: ?route=admin/dashboard");
                }
                exit();
            } 
                exit();
            } else {
                echo "Invalid email or password.";
            }
        
        require_once (__DIR__.'/../views/authentification/login.php');
    }


    public function logout() {
        session_destroy();
        header('Location: /login');
    }

    public function profile() {
        $userId = $_SESSION['user']['id'];     
        $role = $_SESSION['user']['role'];  
        $user = $this->userModel->getProfile($userId);
    
        if ($role == 'teacher') {
            require_once (__DIR__.'/../views/Teacher/teacher_profil.php');
        }      
        elseif ($role == 'student') {
            require_once (__DIR__.'/../views/Student/student_profil.php');
        }
    }
    public function listUsers() {
        $users = $this->userModel->getAllUsers();
        require_once '../App/Views/users.php';
    }
}
?>
