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
    public function getCategoryById($id){
        $query = "SELECT * FROM category WHERE category_id = $id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);
        return $categoryData;
    }

    
    public function updateCategory($caty){
        $query = "UPDATE category SET category_name = :categoryName , category_date = :categoryDate WHERE category_id = :categoryId";
        $stmt = $this->db->prepare($query);
        
        $id = $caty->getCategoryId();
        $name = $caty->getCategoryName();
        $date = $caty->getCategoryDate();
    
        $stmt->bindParam(':categoryId', $id);
        $stmt->bindParam(':categoryName', $name);
        $stmt->bindParam(':categoryDate', $date);
    
        $stmt->execute();
    }
    
}
// $categoryController = new categoryDAO();
// $res = $categoryController->getAllCategorys();
// print_r($res);
