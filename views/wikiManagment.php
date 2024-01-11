<?php 
include 'head.php';
include 'navBar.php';
?>

<!-- Rest of your HTML code -->

<!-- Bootstrap JS and Popper.js
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<div class="container mb-5">
    <h2>All tags</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titel</th>
                <th scope="col">contenu</th>
                <th scope="col">Author</th>
                <th scope="col">Date</th>
                <th scope="col">button</th>

            </tr>
        </thead>
        <tbody>
        <?php foreach ($wikisReturn as $wiki) :
             $buttonClass = $wiki->getIsHidden() == 1 ? 'btn btn-danger' : 'btn btn-success';
        ?>
       
            <tr>
                <td><?= $wiki->getId(); ?></td>
                <td><?= $wiki->getName(); ?></td>
                <td><?= $wiki->getContenu(); ?></td>
                <td><?= $wiki->getUserId()->getName(); ?></td>
                <td><?= $wiki->getWikiDate(); ?></td>
                <td>
                    <a href="index.php?action=hideWiki&id=<?= $wiki->getId(); ?>">
                        <button class="<?= $buttonClass ?>" name="submit" type="submit">Archive</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
    </table>
</div>

