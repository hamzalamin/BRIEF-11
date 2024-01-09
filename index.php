<?php
include_once 'configuration\conection.php';
include 'controllers\userController.php';
include 'controllers\tagController.php';
include 'models\DAO\userDAO.php';
include 'models\DAO\tagDAO.php';

$controllerFunctions = new UserController();
$tagController = new tagController();


if (isset($_GET['action'])){
    $action = $_GET['action'];
    switch($action){
        case 'rege':
            $controllerFunctions->regester_form();
        break;
        case 'regester':
                $controllerFunctions->addUser();
            break;
        case 'login':
            $controllerFunctions->login_form();
        break;
        case 'admin':
            $controllerFunctions->login();
        break;
        case 'tagManagment':
            $tagController->desplayAllTags();
        break;
        case 'insertTag':
            $tagController->AddTag();
        break;
        case 'gettagToUpdate':
            $tagController->getTagDataById();
        break;
        case 'updateTag':
            $tagController->updateTag();
        break;
    }

}


