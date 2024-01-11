<?php include 'head.php'; ?>
<?php include 'navBar.php'; ?>

<body>
<div class="card p-4">
        <h2 class="text-center mb-4">Update Tag</h2>
        <hr>
<div class="container mt-5">
    

        <form class="needs-validation" method="post" action="index.php?action=updateCategory">
            <div class="form-group">
                <label for="tagId">Category ID</label>
                <input type="text" class="form-control" id="tagId" name="category_id" placeholder="category ID" value="<?= $categoryId; ?>" required readonly>
            </div>

            <div class="form-group">
                <label for="tagName">Update Category's Name</label>
                <input type="text" class="form-control" id="tagName" name="category_name" placeholder="Name" value="<?= $categoryName; ?>" required>
            </div>

            <div class="form-group">
                <label for="tagDate">Update Date</label>
                <input type="date" class="form-control" id="tagDate" name="category_date" placeholder="Date of today" value="<?= date('Y-m-d'); ?>" required>
            </div>

            <button class="btn btn-primary btn-lg mt-3" name="submit" type="submit">Update</button>
        </form>
    </div>
</div>

</body>
</html>
