<?php
include '../models/DAO/userDAO.php';
// include '../controllers/userController.php';


$userController = new UserController(new UserDAO());
$userController->addUser();

class UserController {
    private $userDAO;

    public function __construct($userDAO) {
        $this->userDAO = $userDAO;
    }

    // public function getUsers() {
    //    return $this->userDAO->getAllUsers();
    // //    include '../views/userView.php';
    // }
    public function addUser(){

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $addUser = new User($name, $email, $hashedPassword);
            $result = $this->userDAO->regester($email ,$name, $password);
    
            if ($result) {
                echo 'User successfully added to the database.';
            } else {
                echo 'Error adding user to the database.';
            }
        }
        // include '../views/userView.php';
    }
    
}
?>
