<?php
// require_once 'models\wikiModel.php';

require 'configuration\conection.php';

require_once 'models\DAO\tagDAO.php';

require 'models\DAO\wikiDAO.php';
require 'models\DAO\categoryDAO.php';



if (isset($_GET['search'])) {

    $search = $_GET['search'];
    $wikiDAO = new wikiDAO();
    $tagDAO = new tagDAO();
    $catgDAO = new categoryDAO();

    $wikis = $wikiDAO->getAllWiki();
    $catgs = $catgDAO->getAllCategorys();
    $tags = $tagDAO->getAllTags();

    $result = [];

    foreach ($wikis as $wiki) {
        if (stristr($wiki->getName(), $search)) {
            $result[] = $wiki->getId();
        }
    }

    foreach ($tags as $tag) {
        if (stristr($tag->getTagName(), $search)) {
            $wikis_for_tag = $wikiDAO->getWikisForTags($tag->getTagName());
            foreach($wikis_for_tag as $wiki) {
                $result[] = $wiki->getId();
            }
        }
    }

    foreach($catgs as $catg) {
        if (stristr($catg->getCategoryName(), $search)) {
            $wikis_for_catg = $wikiDAO->getWikisForCategory($catg->getCategoryId());
            foreach($wikis_for_catg as $wiki) {
                $result[] = $wiki->getId();
            }
        }
    }
    
    echo json_encode($result);
}
