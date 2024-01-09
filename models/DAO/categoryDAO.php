<?php
include 'models\categoryModel.php';
class categoryDAO{
    private $db;
    public function __construct()
    {
    $this->db = DataBaseConection::getInstance()->getConnection();
    }

    public function getAllCategorys(){
        $query = "SELECT * FROM category";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $categorysData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categorys = array();
        foreach($categorysData as $category){
            $result = new category($category['category_id'], $category['category_name'], $category['category_date']);
            $categorys[] = $result;        
        } 
        return $categorys;
    }
    public function insertCategory($category){
        $query ="INSERT INTO category (category_id, category_name, category_date) VALUES (:category_id, :category_name, :category_date)";
        $stmt = $this->db->prepare($query);

        $id = $category->getCategoryId();
        $name = $category->getCategoryName();
        $date = $category->getCategoryDate();

        $stmt->bindParam(':category_id', $id);
        $stmt->bindParam(':category_name', $name);
        $stmt->bindParam(':category_date', $date);

        $stmt->execute();


    }
    
}
// $categoryController = new categoryDAO();
// $res = $categoryController->getAllCategorys();
// print_r($res);
