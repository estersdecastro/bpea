<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($username, $password) {
        // Logic for user login
        $user = $this->userModel->findUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../public/dashboard.php");
            exit;
        } else {
            return "Invalid username or password.";
        }
    }

    public function logout() {
        // Logic for user logout
        session_start();
        session_destroy();
        header("Location: ../public/UserLogin.php");
        exit;
    }

    public function register($data) {
        // Logic for user registration
        return $this->userModel->createUser($data);
    }

    public function getUser($id) {
        // Logic to get user data
        return $this->userModel->findUserById($id);
    }
}
?>