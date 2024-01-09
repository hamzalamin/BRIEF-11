<?php
include 'models\userModel.php';
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
        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = array();
        foreach ($userData as $user) {
            $result = new User($user['user_id'], $user['name'], $user['email'], $user['password'], $user['role']);
            $users[] = $result;
        }
        return $users;
    }
    public function regester($user) {
        $query = "INSERT INTO users (email, name, password) VALUES (:email, :name, :password)";
        $stmt = $this->db->prepare($query);
        $email = $user->getEmail();
        $name = $user->getName();
        $password = $user->getPassword();
        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);
    
        // Execute the query
        $stmt->execute();
    }
    public function login($user){
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $this->db->prepare($query);
        $email = $user->getEmail();
        $password = $user->getPassword();

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        // $result = array();
       
        return $userData;
    }

    
}
 
