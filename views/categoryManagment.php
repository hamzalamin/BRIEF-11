<?php
include 'head.php';
include 'navBar.php';
?>

<button class="btn btn-primary mx-5 mt-3 mb-5" data-toggle="modal" data-target="#addFormModal">Add Category</button>

<!-- Add Form Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" role="dialog" aria-labelledby="addFormModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" method="post" action="index.php?action=insertCategory">
                    <div class="">
                        <label for="signInEmail">Category Name</label>
                        <input type="text" class="form-control" id="signInEmail" name="name"
                            placeholder="Name" required>
                        
                        <label for="signInEmail">Date</label>
                        <input type="date" class="form-control" id="signInEmail" name="date" placeholder="Date of today" 
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
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Date</th>
                <th scope="col">button</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($categoeyReturn as $Category) :?>
                <tr>
                    
                    <td><?= $Category->getCategoryId(); ?></td>
                    <td><?= $Category->getCategoryName(); ?></td>
                    <td><?= $Category->getCategoryDate(); ?></td>
                    <td><a href=""><button class="btn btn-danger"  name="submit" type="submit">Delet</button></a>
                    <a href="index.php?action=getCategoryToUpdate&id=<?= $Category->getCategoryId(); ?> "><button class="btn btn-success" name="submit" type="submit">Edit</button></a></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
