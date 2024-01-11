<?php 

class categoryController{
    public function desplayAllCategorys(){
        $categoryDAO = new categoryDAO();
        $categoeyReturn = $categoryDAO->getAllCategorys();

        include 'views\categoryManagment.php';
    }

    public function addCategory(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $date = $_POST['date'];

            $addCategory = new category(0, $name, $date);

            $result = new categoryDAO();
            $result->insertCategory($addCategory);
            if ($result) {
                # code...
                header('location: index.php?action=categoryManagment');
            }else {
                echo 'Error adding CATEGORY to the database.';
            }
        }
    }

    public function getCatygorysIdController(){
        $id = $_GET['id'];

        $result = new categoryDAO();
        $categoryReturn = $result->getCategoryById($id);

        $categoryId = $categoryReturn['category_id'];
        $categoryName = $categoryReturn['category_name'];
        $categoryDate = $categoryReturn['category_date'];

        include 'views\updateCtaegory.php';

        
    }

    public function updateCategoryById(){
        if (isset($_POST['category_id'])) {
            $categoryId = $_POST['category_id'];
            $categoryName = $_POST['category_name'];
            $categoryDate = $_POST['category_date'];

            $catys = new category($categoryId, $categoryName, $categoryDate);

            $result = new categoryDAO();
            $result->updateCategory($catys);

            header('location: index.php?action=categoryManagment');

        }
    }
}