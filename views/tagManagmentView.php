<?php
include 'head.php';
include 'navBar.php';
?>

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

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="container">
    <h2>All tags</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Tag ID</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Tag Date</th>
                <th scope="col">button</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($tagReturn as $tag) : ?>
                <tr>
                    <td><?= $tag->getTagId(); ?></td>
                    <td><?= $tag->getTagName(); ?></td>
                    <td><?= $tag->getTagDate(); ?></td>
                    <td><a href=""><button class="btn btn-danger"  name="submit" type="submit">Delet</button></a>
                    <a href="index.php?action=gettagToUpdate&id=<?= $tag->getTagId(); ?>"><button class="btn btn-success" name="submit" type="submit">Edit</button></a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
