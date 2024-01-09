<?php

class category{
    private $category_id;
    private $category_name;
    private $category_date;

    public function __construct($category_id, $category_name, $category_date){
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->category_date = $category_date;

    }

    public function getCategoryId(){
        return $this->category_id;
    }
    public function getCategoryName(){
        return $this->category_name;
    }
    public function getCategoryDate(){
        return $this->category_date;
    }
}