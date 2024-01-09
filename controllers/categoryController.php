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
}