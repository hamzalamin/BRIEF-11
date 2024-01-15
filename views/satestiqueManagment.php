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
                    <h5 class="card-title"><?= $wiki['name'] ?? ''; ?></h5>
                    <p class="card-text">Author: <?= $wiki['username'] ?? ''; ?></p>
                    <p class="card-text">Number of Wikis: <?= $wiki['content_count'] ?? ''; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

