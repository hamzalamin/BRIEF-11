<?php
// include '../models/DAO/userDAO.php';
// include '../controllers/userController.php';


// $userController = new UserController(new UserDAO());
// $userController->addUser();
session_start();
class UserController {

    public function addUser(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['username '];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $addUser = new User(0,$name, $email, $password, null);
            
            $result = new UserDAO();
            $result->regester($addUser);
            
    
            if ($result) {
                    header('location: index.php?action=regester');                
            } else {
                echo 'Error adding user to the database.';
            }
        }
        include 'views\homeView.php';
    }

    public function login() {
        // echo 'chi lkjkjkjkjkjkjkjkjkjkjkjkj';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User('', '', $email, $password, null);
            $userDAO = new UserDAO();
            $user = $userDAO->login($user);

            if (!empty($user)) {
                if ($user['role'] == 0) {
                    session_start();
                    // $userId = $user['user_id'];
                    $_SESSION['user'] = $user;
                    header('location: index.php?action=autourWikissPage');
                } else {
                    header('location: index.php?action=dashboard_form_');
                }
            } 

            
        // Include your login view file
        include "views\login.php";
    }
 
}

    public function login_form() {
         include "views\login.php";

        }
    public function dashboard_form() {
            include "views\Autuer.php";
   
        }
   
    public function regester_form() {
            include "views\userView.php";
   
       }

}
?>
