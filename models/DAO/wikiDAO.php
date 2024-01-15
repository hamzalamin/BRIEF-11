<?php
require 'models\wikiModel.php';
require_once 'userDAO.php';
require_once 'tagDAO.php';
//   '../../configuration/conection.php';


class wikiDAO
{
    private $db;
    public function __construct()
    {
        $this->db = DataBaseConection::getInstance()->getConnection();
    }

    public function getAllWiki()
    {
        $query = "SELECT wiki.*, users.username, category.category_name FROM wiki INNER JOIN users ON wiki.user_id = users.user_id INNER JOIN category on  wiki.category_id = category.category_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $wikiData = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $wikis = array();
        foreach ($wikiData as $wiki) {
            $userdao = new UserDAO();
            $u = $userdao->getuserbyid($wiki['user_id']);
            $result = new wiki($wiki['id'], $wiki['name'], $wiki['contenu'], $u, $wiki['category_id'], $wiki['wiki_date'], $wiki['is_hide']);
            $wikis[] = $result;
        }
        return $wikis;
    }
    public function getWikiNotArchived()
    {
        $query = "SELECT wiki.*, users.username, category.category_name 
        FROM wiki 
        INNER JOIN users ON wiki.user_id = users.user_id 
        INNER JOIN category ON wiki.category_id = category.category_id
        WHERE wiki.is_hide = 0";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $wikiData = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $wikis = array();
        foreach ($wikiData as $wiki) {
            $userdao = new UserDAO();
            $u = $userdao->getuserbyid($wiki['user_id']);
            $result = new wiki($wiki['id'], $wiki['name'], $wiki['contenu'], $u, $wiki['category_id'], $wiki['wiki_date'], $wiki['is_hide']);
            $wikis[] = $result;
        }
        return $wikis;
    }

    public function getWikisById($id){
        $query = "SELECT * FROM wiki WHERE id = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $wikisData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $wikisData;
    }


    public function UpdateWikiOfAutore($wiki)
    {
        $query = "UPDATE wiki SET name = :name , contenu = :contenu , wiki_date = :wiki_date  WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $id = $wiki->getId();
        $name = $wiki->getName();
        $contenu = $wiki->getContenu();
        $wiki_date = $wiki->getWikiDate();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':wiki_date', $wiki_date);
        
        $stmt->execute();
    }


    public function getStatistique(){
        $query = "SELECT users.user_id, users.username, COUNT(wiki.contenu) AS content_count
                  FROM wiki
                  INNER JOIN users ON wiki.user_id = users.user_id
                  GROUP BY users.user_id, users.username";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $statData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $stats = array();
        foreach ($statData as $stat) {
            $result = array(
                'user_id' => $stat['user_id'],
                'username' => $stat['username'],
                'content_count' => $stat['content_count']
            );
            $stats[] = $result;
        }
        return $stats;
    }
    


    public function UpdateWiki($wiki)
    {
        $query = "UPDATE wiki SET is_hide = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $id = $wiki->getId();

        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }






    public function getUserWikis($userid)
    {
        $query = "SELECT * FROM wiki WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);

       
        $stmt->bindParam(':user_id', $userid, PDO::PARAM_INT);
        $stmt->execute();
        $wikisArray = array();
        $wikisData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($wikisData as $wikiData) {
            $uderdao = new UserDAO();

            $wikis = new Wiki($wikiData['id'], $wikiData['name'], $wikiData['contenu'], $uderdao->getuserbyid($userid), $wikiData['category_id'], $wikiData['wiki_date'], $wikiData['is_hide']);
            $wikisArray[] = $wikis;
        }

        return $wikisArray;
    }




    function addWikiWithTags($wiki, $tags)
    {

        $query = "INSERT INTO wiki (name, contenu, user_id, category_id, wiki_date) 
                  VALUES (:title, :content, :author_id, :category_id, :wiki_date)";
        $stmt = $this->db->prepare($query);
        $wiki_title = $wiki->getName();
        $wiki_content = $wiki->getContenu();
        $author_id = $wiki->getUserId();
        $category_id = $wiki->getCategoryId();
        $image_filename = $wiki->getWikiDate();

        $stmt->bindParam(':title', $wiki_title);
        $stmt->bindParam(':content', $wiki_content);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':wiki_date', $image_filename);
        $stmt->execute();


        $wikiId = $this->db->lastInsertId();



        foreach ($tags as $tagId) {
            $query = "INSERT INTO wikitag (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':wiki_id', $wikiId);
            $stmt->bindParam(':tag_id', $tagId);
            $stmt->execute();
        }
    }
    public function lastTreeWikis()
    {
        $query = "SELECT id, name, contenu, user_id, category_id, wiki_date
          FROM wiki
          WHERE wiki_date <= CURDATE() AND is_hide = 0
          ORDER BY wiki_date DESC
          LIMIT 3";



        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $wikiData = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $wikis = array();
        foreach ($wikiData as $wiki) {
            $userdao = new UserDAO();
            $u = $userdao->getuserbyid($wiki['user_id']);
            $result = new wiki($wiki['id'], $wiki['name'], $wiki['contenu'], $u, $wiki['category_id'], $wiki['wiki_date'], '');
            $wikis[] = $result;
        }
        return $wikis;
    }
    public function delet_wiki($id){
        $query = "DELETE FROM wiki WHERE id = :id";
    
        
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
                header('location: index.php?action=autourWikissPage');
        
        }
    // }
    
    public function getWikisForTags($tag)
    {
        $sql = "SELECT wiki.* FROM wiki
        INNER JOIN wikitag ON wikitag.wiki_id = wiki.id
        INNER JOIN tag ON tag.tag_id = wikitag.tag_id
        WHERE tag.tag_name = ? AND wiki.is_hide = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$tag]);
        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikisArray = [];
        foreach ($wikis as  $wikiData) {
            $uderdao = new UserDAO();
            $wiki = new Wiki($wikiData['id'], $wikiData['name'], $wikiData['contenu'], $uderdao->getuserbyid($wikiData['user_id']), $wikiData['category_id'], $wikiData['wiki_date'], $wikiData['is_hide']);
            $wikisArray[] = $wiki;
        }

        return $wikisArray;
    }

    public function getWikisForCategory($category_id) {
        $sql = "SELECT * FROM wiki WHERE category_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$category_id]);
        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikisArray = [];
        foreach ($wikis as  $wikiData) {
            $uderdao = new UserDAO();
            $wiki = new Wiki($wikiData['id'], $wikiData['name'], $wikiData['contenu'], $uderdao->getuserbyid($wikiData['user_id']), $wikiData['category_id'], $wikiData['wiki_date'], $wikiData['is_hide']);
            $wikisArray[] = $wiki;
        }
        return $wikisArray;

    }
}
// session_start();

// $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// $categoryController = new wikiDAO();
// $res = $categoryController->getUserWikis($userId); 
// echo '<pre>';
// print_r($res);
// echo '<pre>';