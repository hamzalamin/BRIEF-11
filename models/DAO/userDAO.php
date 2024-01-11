<?php
// include '../../configuration/conection.php';
include 'models\userModel.php';
class UserDAO {
    private $db;

    public function __construct()
    {
        $this->db = DataBaseConection::getInstance()->getConnection();
    }

    public function getuserbyid($id){
        $query = "SELECT * FROM users where user_id =$id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $result = new User($userData['user_id'], $userData['username'], $userData['email'], $userData['password'], $userData['role']);
           
        return $result;

    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = array();
        foreach ($userData as $user) {
            $result = new User($user['user_id'], $user['username '], $user['email'], $user['password'], $user['role']);
            $users[] = $result;
        }
        return $users;
    }
    public function regester($user) {
        $query = "INSERT INTO users (email, username , password) VALUES (:email, :username, :password)";
        $stmt = $this->db->prepare($query);
        $email = $user->getEmail();
        $username  = $user->getName();
        $password = $user->getPassword();
        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
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

 
