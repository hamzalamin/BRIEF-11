<?php

include_once 'configuration\conection.php';
include 'controllers\userController.php';
include 'controllers\categoryController.php';
include 'controllers\wikiController.php';
include 'controllers\tagController.php';
include 'models\DAO\userDAO.php';
include 'models\DAO\tagDAO.php';
include 'models\DAO\categoryDAO.php';
include 'models\DAO\wikiDAO.php'; 

$controllerFunctions = new UserController();
$tagController = new tagController();
$categoryController = new categoryController();
$wikiController = new wikiController();

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
        case 'dashboard_form_':
            $controllerFunctions->dashboard_form();
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
        case 'categoryManagment':
            $categoryController->desplayAllCategorys();
            break;
        case 'insertCategory':
            $categoryController->addCategory();
            break;
        case 'getCategoryToUpdate':
            $categoryController->getCatygorysIdController();
            break;
        case 'updateCategory':
            $categoryController->updateCategoryById();
            break;
        case 'hideWiki':
            $wikiController->HideWiki();
            break;
        case 'wikisManagment':
            $wikiController->desplayAllwikis();
            break;
        case 'homeView.php':
            $wikisReturn = $wikiController->desplayTreeWikis();
            $categoriesReturn = $categoryController->desplayTreeWikis();
            include 'views\homeView.php';
            break;
        case 'statistique':
            $wikisReturnStatisteque = $wikiController->getWikiStatesteque();
            break;
        case 'autourWikissPage':
            // session_start();
            $var = $_SESSION['user'];
            $userid = $var['user_id'];
            $tags = $tagController->desplayAllTagsforselect();
            $categoryss = $categoryController->desplayAllCategorysforSelecy();
            $userWikis = $wikiController->getWikisOfAuteur();
            
            include "views\auteurAddWikis.php";
        break;
        case 'insertwiki':
            $wikiController->add_wiki();
        break;
        case 'getWikiToUpdate':
            $wikiController->getWikiById();

        break;
        case 'updatewiki':
            $wikiController->UpdateWikiOfautour();
        break;
        case 'logout':
            $controllerFunctions->logout();
        break;
        case 'deleteWiki':
            $wikiController->delet_wiki();
        break;
        case 'detaillswikis':
            $wikis = $wikiController->getWikiForsinglePage();
            // $categoryController->desplayAllCategorys();
            // $controllerFunctions->
        break;
        case 'deleteTag':
            $tagController->delete_tag();
        break;




        default:
            break;
    }
} else {
    $wikisReturn = $wikiController->desplayTreeWikis();
    $categoriesReturn = $categoryController->desplayTreeWikis();


    include 'views\homeView.php';

}
