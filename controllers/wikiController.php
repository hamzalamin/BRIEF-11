<?php
class wikiController{
    public function desplayAllwikis(){
        $wikiDAO = new wikiDAO();
        $wikisReturn = $wikiDAO->getAllWiki();

        include 'views\wikiManagment.php';
    }
    public function HideWiki(){
        // Assuming these values come from the URL parameters
        $id = $_GET['id'];
        $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
        $contenu = filter_input(INPUT_GET, 'contenu', FILTER_SANITIZE_STRING);
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        $wiki_date = filter_input(INPUT_GET, 'wiki_date', FILTER_SANITIZE_STRING);
        $is_hide = filter_input(INPUT_GET, 'is_hide', FILTER_VALIDATE_BOOLEAN);
    
        // Create a new wiki object with the retrieved values
        $wiki = new wiki($id, $name, $contenu, $user_id, $category_id, $wiki_date, $is_hide);
    
        $wikiDAO = new wikiDAO();
        $wikisReturn = $wikiDAO->UpdateWiki($wiki);
    
        // Instead of assigning an empty array, you can fetch the updated data again
        // Assuming there is a method in your wikiDAO to get all wikis
        $wikisReturn = $wikiDAO->getAllWiki();
    
        include 'views/wikiManagment.php';
    }
    
    
    
}