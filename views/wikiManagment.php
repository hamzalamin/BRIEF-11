<?php 
include 'head.php';
include 'views\navBarOfAdmin.php';
?>
<style>
.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-body {
    padding: 1.25rem; 
}

.card-title {
    font-size: 1.25rem; 
    margin-bottom: 0.75rem; 
}

.card-text {
    font-size: 1rem;
    color: #6c757d; 
}

.btn {
    margin-top: 0.75rem;
}
</style>

<div class="container mb-5">
    <h2>All tags</h2>

    <div class="row">
        <?php foreach ($wikisReturn as $wiki) :
$buttonClass = $wiki->getIsHidden() == 1 ? 'btn btn-danger' : 'btn btn-info';
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
