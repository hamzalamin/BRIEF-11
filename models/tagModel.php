<?php

class tag {
    private $tag_id;
    private $tag_name;
    private $tag_date;

    public function __construct($tag_id, $tag_name, $tag_date){
        $this->tag_id = $tag_id;
        $this->tag_name = $tag_name;
        $this->tag_date = $tag_date;
    }
    
    public function getTagId() {
        return $this->tag_id;
    }
    public function getTagName() {
        return $this->tag_name;
    }
    public function getTagDate() {
        return $this->tag_date;
    }


}