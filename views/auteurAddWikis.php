<?php
include 'head.php';
include 'views\navBar.php';
?>

<button class="btn btn-primary mx-5 mt-3 mb-5" data-toggle="modal" data-target="#addFormModal">Add wiki</button>

<!-- Add Form Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="addFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModalLabel">Add New wiki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" action="index.php?action=insertwiki">
                    <div class="form-group">
                        <label for="wikiTitle">Wiki's Title</label>
                        <input type="text" class="form-control" id="wikiTitle" name="wiki_name" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="wikiContent">Wiki's Content</label>
                        <textarea class="form-control" id="wikiContent" name="wik_content" placeholder="Content" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="authorId">Author ID</label>
                        <input type="number" class="form-control" id="authorId" value="<?= $userid; ?>" name="wik_autour" required>
                    </div>

                    <!-- Tags Selection using Checkboxes -->
                    <div class="form-group">
                        <label>Tags:</label><br>
                        <?php foreach ($tags as $tag): ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag<?php echo $tag->getTagId(); ?>" name="tags[]" value="<?php echo $tag->getTagId(); ?>">
                                <label class="form-check-label" for="tag<?php echo $tag->getTagId(); ?>"><?php echo $tag->getTagName(); ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Category ID Selection -->
                    <div class="form-group">
                        <label for="categoryId">Select Category:</label>
                        <select class="form-control" id="categoryId" name="wik_category" required>
                            <?php foreach ($categoryss as $category): ?>
                                <option value="<?php echo $category->getCategoryId(); ?>"><?php echo $category->getCategoryName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="wikiDate">Date</label>
                        <input type="date" class="form-control" id="wikiDate" name="wiki_date" value="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <button class="btn btn-primary btn-lg mt-3" name="submit" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rest of your HTML code -->
<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">

<?php
// $wikiDAO = new wikiDAO();
// $userDAO = new userDAO();
// $user = $userDAO->getuserbyid($_SESSION['user_id']);
// $userWikis = $wikiDAO->getUserWikis($user);
?>
<h2>All wikis</h2>

<div class="row">
    <?php foreach ($userWikis as $wiki) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $wiki->getName(); ?></h5>
                    <p class="card-text"><?= $wiki->getContenu(); ?></p>
                    <p class="card-text">Author: <?= $wiki->getUserId()->getName(); ?></p>
                    <p class="card-text">Date: <?= $wiki->getWikiDate(); ?></p>
                    <a href="index.php?action=getWikiToUpdate&id=<?= $wiki->getId(); ?>" class="btn btn-success">Edit</a>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>






