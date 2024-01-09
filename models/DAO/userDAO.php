<?php
include '../models/userModel.php';
class UserDAO {
    private $db;

    public function __construct()
    {
        $this->db = DataBaseConection::getInstance()->getConnection();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $userData = $stmt->fetchAll();
        $users = array();
        foreach ($userData as $user) {
            $result = new User($user['user_id'], $user['name'], $user['email'], $user['password'], $user['role']);
            $users[] = $result;
        }
        return $users;
    }
    public function regester($email, $name, $password) {
        $query = "INSERT INTO users (email, name, password) VALUES (:email, :name, :password)";
        $stmt = $this->db->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);
    
        // Execute the query
        return $stmt->execute();
    }
    
}
 
