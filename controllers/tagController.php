<?php

class tagController {

    public function desplayAllTags(){
        $tagDAO = new tagDAO();
        $tagReturn = $tagDAO->getAllTags();
        // print_r($tagReturn);
        include 'views/tagManagmentView.php';
    }



    public function AddTag(){
        $result = new tagDAO();
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $name = $_POST['tag_name'];
            $date = $_POST['tag_date'];
            $addTag = new tag(0, $name, $date);

            $result->insertTag($addTag);
        }
        $tagReturn = $result->getAllTags();
        include 'views\tagManagmentView.php';
    }
    public function getTagDataById(){
        $id = $_GET['id'];
        $result = new tagDAO();
        $tagReturn = $result->getTagsById($id);
       
        
        $tagId = $tagReturn['tag_id'];
        $tagName = $tagReturn['tag_name'];
        $tagDate = $tagReturn['tag_date'];
            // $result->updateTags($addTag);         
            include 'views\updateTag.php';
        }
    
        public function updateTag(){
            if(isset($_POST['tag_id'])){
                $tagId = $_POST['tag_id'];
                $tagName = $_POST['tag_name'];
                $tagDate = $_POST['tag_date'];
        
                $tags = new tag($tagId, $tagName, $tagDate);
                
                $result = new tagDAO();
                $result->updateTags($tags); 
                header('location: index.php?action=tagManagment');
            }
        }
        
}
