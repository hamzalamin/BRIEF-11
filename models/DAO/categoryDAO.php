<?php
// include_once __DIR__ . '\models\categoryModel.php';
include '../categoryModel.php';
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
        $categorysData = $stmt->fetchAll();
        $categorys = array();
        foreach($categorysData as $category){
            $result = new category($category['category_id'], $category['category_name'], $category['category_date']);
            $categorys[] = $result;        
        } 
        return $categorys;
    }
    
}
// $categoryController = new categoryDAO();
// $res = $categoryController->getAllCategorys();
// print_r($res);
