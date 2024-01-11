<!-- SELECT wiki.name as title,wiki.contenu, users.name , category.category_name from wiki INNER JOIN users on users.user_id = wiki.user_id INNER JOIN category on category.category_id = wiki.category_id;  -->
<?php
include 'models\wikiModel.php';
// // include '../userModel.php';
// include '../categoryModel.php';
require_once 'userDAO.php';
// include '../../configuration/conection.php';

class wikiDAO {
    private $db;
    public function __construct()
    {
        $this->db = DataBaseConection::getInstance()->getConnection();
    }

    public function getAllWiki(){
        $query = "SELECT wiki.*, users.username, category.category_name FROM wiki INNER JOIN users ON wiki.user_id = users.user_id INNER JOIN category on  wiki.category_id = category.category_id";
        // $query = "SELECT wiki.id, wiki.name, wiki.contenu, wiki.user_id, wiki.category_id, wiki.wiki_date, wiki.is_hide, users.name as user_name, category.category_name FROM wiki INNER JOIN users ON wiki.user_id = users.user_id INNER JOIN category on category.category_id = wiki.category_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $wikiData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';

        // var_dump($wikiData);
        
        $wikis = array();
        foreach($wikiData as $wiki){
            $userdao=new UserDAO();
            $u=$userdao->getuserbyid($wiki['user_id']);
            $result = new wiki($wiki['id'], $wiki['name'], $wiki['contenu'],$u , $wiki['category_id'], $wiki['wiki_date'], $wiki['is_hide']);
            $wikis[] = $result;
        }
        return $wikis;
    }
    public function UpdateWiki($wiki){
        $query = "UPDATE wiki SET is_hide = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $id = $wiki->getId();
        // $is_hide = $wiki->getisHidden();

        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
// $categoryController = new wikiDAO();
// $res = $categoryController->getAllWiki();
// echo '<pre>';
// print_r($res);
// echo '<pre>';