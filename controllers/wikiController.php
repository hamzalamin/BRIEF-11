<?php
class wikiController{
    public function desplayAllwikis(){
        $wikiDAO = new wikiDAO();
        $wikisReturn = $wikiDAO->getAllWiki();
        // var_dump($wikisReturn);

        include 'views\wikiManagment.php';
    }
    public function desplayNotHidewikis(){
        $wikiDAO = new wikiDAO();
        $wikisReturn = $wikiDAO->getWikiNotArchived();
        // var_dump($wikisReturn);

        // include 'views\homeView.php';
    }
    public function getWikiStatesteque(){
        $wikiDAO = new wikiDAO();
        $wikisReturnStatisteque = $wikiDAO->getStatistique();
        include 'views\satestiqueManagment.php';
    }
    
    public function desplayTreeWikis() {
        $wikiDAO = new wikiDAO();
        return $wikisReturn = $wikiDAO->lastTreeWikis();
        // var_dump($wikisReturn);

        // include 'views\wikiManagment.php';
    }
    public function HideWiki(){

        $id = $_GET['id'];
        $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
        $contenu = filter_input(INPUT_GET, 'contenu', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        $wiki_date = filter_input(INPUT_GET, 'wiki_date', FILTER_SANITIZE_STRING);
        $is_hide = filter_input(INPUT_GET, 'is_hide', FILTER_VALIDATE_BOOLEAN);
    
        $wiki = new wiki($id, $name, $contenu, $user_id, $category_id, $wiki_date, $is_hide);
    
        $wikiDAO = new wikiDAO();
        $wikisReturn = $wikiDAO->UpdateWiki($wiki);
    
        $wikisReturn = $wikiDAO->getAllWiki();
        // var_dump($wikisReturn);

        include 'views/wikiManagment.php';
    }
    public function getWikiById(){
        $id = $_GET['id'];
        $results = new wikiDAO();
        $wikiReturn = $results->getWikisById($id);

        $wikiId = $wikiReturn['id'];
        $name = $wikiReturn['name'];
        $contenu = $wikiReturn['contenu'];
        $wiki_date = $wikiReturn['wiki_date'];

        include 'views\UpdateWikiOfAutorer.php';




    }

    public function UpdateWikiOfautour(){
        if(isset($_POST['wiki_id'])){

            $id = $_POST['wiki_id'];
            $name = $_POST['wiki_name'];
            $contenu = $_POST['wiki_contenu']; 
            $wiki_date = $_POST['wiki_date'];


            $wiki = new Wiki($id, $name, $contenu, '','', $wiki_date, '');

            $wikiDAO = new wikiDAO();
            $wikisReturn = $wikiDAO->UpdateWikiOfAutore($wiki);
            header('location: index.php?action=autourWikissPage');
        }
    
    }
    public function deletWiki(){
        
    }



    public function getWikisOfAuteur() {
        // $userDAO = new userDAO();
        // $user = $userDAO->getuserbyid($_SESSION['user_id']);
        $var = $_SESSION['user'];
        $userid = $var['user_id'];
        // $wikiDAO = new wikiDAO();
        // $userWikis = $wikiDAO->getUserWikis($user);
        $wikiDAO = new wikiDAO();
        // $user = $_SESSION['user'];
        $userWikis = $wikiDAO->getUserWikis($userid);
        // print_r($userWikis);
        return $userWikis;
        // include 'views\auteurAddWikis.php';
    }
    
    
    

    // function getWikisOfAuteur(){
    //     $wikiDAO = new wikiDAO();
    //     // $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        
    //     $userWikis = $wikiDAO->getUserWikis($wikiDAO);
    //     // var_dump($userWikis);
    //     include 'views\auteurAddWikis.php';
    // }
    


    public static function add_wiki(){
            $wiki_title = $_POST['wiki_name'] ?? '';
            $wiki_content = $_POST['wik_content'] ?? '';
            $author_id = $_POST['wik_autour'] ?? '';
            $category_id = $_POST['wik_category'] ?? ''; 
            $wiki_date = $_POST['wiki_date'] ?? '';

            $wikisDAO = new wikiDAO();
            if (isset($wikisDAO)) {
                $wiki = new Wiki('', $wiki_title, $wiki_content, $author_id, $category_id,  $wiki_date, '');
    
                if (!empty($_POST['tags'])) {
                    $tags = $_POST['tags'];
                    $wikisDAO->addWikiWithTags($wiki, $tags);
                    header('location:index.php?action=autourWikissPage');
                    exit; 
                } else {
                    echo 'No tags provided.';
                }
            } else {
                echo 'Error: $wikisDAO is not defined.';
            }
       }



      
       



    // public static function insert_wikis() {
    //     $wiki_title = $_POST['wiki_title'] ?? '';
    //     $wiki_content = $_POST['wiki_content'] ?? '';
    //     $author_id = $_POST['author_id'] ?? '';
    //     $category_id = $_POST['category_id'] ?? '';

        
        // $wikisDAO = new wikiDAO();
        // if (isset($wikisDAO)) {
        //     // Create Wiki object
        //     $wiki = new Wiki('', $wiki_title, $wiki_content, $author_id, $category_id,  '', '');

        //     if (!empty($_POST['tags'])) {
        //         $tags = $_POST['tags'];
        //         $wikisDAO->addWikiWithTags($wiki, $tags);
        //         header('location:index.php?action=auther');
        //         exit; 
        //     } else {
        //         echo 'No tags provided.';
        //     }
        // } else {
        //     echo 'Error: $wikisDAO is not defined.';
        // }
    // }
    // public static function search(){
    //     $searchTerm = $_GET['query'] ?? '';
    //     $wikisDAO = new wikiDAO();
    //     $results = $wikisDAO->search_data($searchTerm);

    //     // Return the results as JSON
    //     header('Content-Type: application/json');
    //     echo json_encode($results);
    // }

    // public static function delet_wiki(){
    //     $id = $_GET['id'];
    //     $wikisDAO = new wikiDAO();
    //     $wikisDAO->delet_wiki($id);

    //    header('location: index.php?action=auther');

    // }

}
