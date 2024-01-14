<?php
include 'head.php';
include 'views\navBar.php';
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
<h2>Statestique</h2>

<div class="row">
    <?php foreach ($wikisReturnStatisteque as $wiki) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($wiki['name'])) : ?>
                        <h5 class="card-title"><?= $wiki['name']; ?></h5>
                    <?php endif; ?>
                    <?php if (isset($wiki['username'])) : ?>
                        <p class="card-text">Author: <?= $wiki['username']; ?></p>
                    <?php endif; ?>
                    <?php if (isset($wiki['wiki_date'])) : ?>
                        <p class="card-text">Date: <?= $wiki['wiki_date']; ?></p>
                    <?php endif; ?>
                    <?php if (isset($wiki['content_count'])) : ?>
                        <p class="card-text">Number of Wikis: <?= $wiki['content_count']; ?></p>
                    <?php endif; ?>
                    <!-- You can add a link to the edit page if needed -->
                    <!-- <a href="index.php?action=getWikiToUpdate&id=<?= $wiki['id']; ?>" class="btn btn-success">Edit</a> -->
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
