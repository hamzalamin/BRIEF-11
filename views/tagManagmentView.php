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
</style>
<button class="btn btn-primary mx-5 mt-3 mb-5" data-toggle="modal" data-target="#addFormModal">Add Tag</button>

<!-- Add Form Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="addFormModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModalLabel">Add New TAG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" action="index.php?action=insertTag">
                    <div class="">
                        <label for="signInEmail">Tag's Name</label>
                        <input type="text" class="form-control" id="signInEmail" name="tag_name"
                            placeholder="Name" required>
                        
                        <label for="signInEmail">Date</label>
                        <input type="date" class="form-control" id="signInEmail" name="tag_date" placeholder="Date of today" 
                        value="<?= date('Y-m-d'); ?>" required>
                        
                    </div>

                    <button class="btn btn-primary btn-lg mt-3" name="submit" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rest of your HTML code -->

<div class="container">
    <h2>All tags</h2>

    <div class="row">

        <?php foreach ($tagReturn as $tag) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $tag->getTagName(); ?></h5>
                        <p class="card-text">ID: <?= $tag->getTagId(); ?></p>
                        <p class="card-text">Date: <?= $tag->getTagDate(); ?></p>
                        <a href="index.php?action=deleteTag&tag_id=<?= $tag->getTagId(); ?>" class="btn btn-danger">Delete</a>
                        <a href="index.php?action=gettagToUpdate&id=<?= $tag->getTagId(); ?>" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>