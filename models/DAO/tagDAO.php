<?php
include 'models\tagModel.php';

class tagDAO{
    private $db;

    public function __construct(){
        $this->db = DataBaseConection::getInstance()->getConnection();
    }

    public function getAllTags(){
        $query ="SELECT * FROM tag";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $tagsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tags = array();
        foreach($tagsData as $tag){
            $result = new tag($tag['tag_id'] ,$tag['tag_name'], $tag['tag_date']);
            $tags[] = $result;
        }
        return $tags;
    }

    public function getTagsById($id){
        $query ="SELECT * FROM tag WHERE tag_id = $id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $tagsData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tagsData;
    }

    public function insertTag($tags){
        $query ="INSERT INTO tag (tag_name, tag_date) VALUES (:tag_name, :tag_date)";
        $stmt = $this->db->prepare($query);
        $name = $tags->getTagName();
        $date = $tags->getTagDate();

        $stmt->bindParam(':tag_name', $name);
        $stmt->bindParam(':tag_date', $date);

        $stmt->execute();
    }

    public function updateTags($tags) {
        $query = "UPDATE tag SET tag_date = :tagDate, tag_name = :tagName WHERE tag_id = :tagId";
        $stmt = $this->db->prepare($query);
        
        $name = $tags->getTagName();
        $date = $tags->getTagDate();
        $id = $tags->getTagId();


        $stmt->bindParam(':tagDate', $date);
        $stmt->bindParam(':tagName', $name);
        $stmt->bindParam(':tagId', $id);
    
        $stmt->execute();
    }
}    