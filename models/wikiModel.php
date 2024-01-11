<?php
class wiki {
    private $id;
    private $name;
    private $contenu;
    private $user_id;
    private $category_id;
    private $wiki_date;
    private $is_hide;

    public function __construct($id, $name, $contenu, $user_id, $category_id, $wiki_date, $is_hide)
    {
        $this->id = $id;
        $this->name = $name;
        $this->contenu = $contenu;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->wiki_date = $wiki_date;
        $this->is_hide = $is_hide;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getContenu(){
        return $this->contenu;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function getCategoryId(){
        return $this->category_id;
    }
    public function getWikiDate(){
        return $this->wiki_date;
    }
    public function getisHidden(){
        return $this->is_hide;
    }

}