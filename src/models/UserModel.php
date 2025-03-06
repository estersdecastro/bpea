<?php
class UserModel {
    private $db;

    public function __construct($databaseConnection) {
        $this->db = $databaseConnection;
    }

    public function createUser($userData) {
        // Logic to insert a new user into the database
        $stmt = $this->db->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $userData['username']);
        $stmt->bindParam(':password', password_hash($userData['password'], PASSWORD_DEFAULT));
        $stmt->bindParam(':email', $userData['email']);
        return $stmt->execute();
    }

    public function getUserById($userId) {
        // Logic to retrieve a user by ID
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($userId, $userData) {
        // Logic to update user information
        $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
        $stmt->bindParam(':username', $userData['username']);
        $stmt->bindParam(':email', $userData['email']);
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }

    public function deleteUser($userId) {
        // Logic to delete a user
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }

    public function authenticateUser($username, $password) {
        // Logic to authenticate a user
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>