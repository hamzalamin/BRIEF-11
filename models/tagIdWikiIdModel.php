<?php

class tagForWiki{
    private $wiki_id;
    private $tag_id;

    public function __construct( $wiki_id, $tag_id ){

        $this->wiki_id = $wiki_id;
        $this->tag_id = $tag_id;
    }

    public function getWikiId(){
        return $this->wiki_id;
    }
    public function getTagId(){
        return $this->tag_id;
    }
}