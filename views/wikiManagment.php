<?php 
include 'head.php';
include 'navBar.php';
?>

<div class="container mb-5">
    <h2>All tags</h2>

    <div class="row">
        <?php foreach ($wikisReturn as $wiki) :
             $buttonClass = $wiki->getIsHidden() == 1 ? 'btn btn-danger' : 'btn btn-success';
        ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wiki->getName(); ?></h5>
                        <p class="card-text"><?= $wiki->getContenu(); ?></p>
                        <p class="card-text">Author: <?= $wiki->getUserId()->getName(); ?></p>
                        <p class="card-text">Date: <?= $wiki->getWikiDate(); ?></p>
                        <a href="index.php?action=hideWiki&id=<?= $wiki->getId(); ?>" class="<?= $buttonClass ?>">
                            Archive
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
