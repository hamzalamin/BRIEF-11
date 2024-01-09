<?php include 'head.php'; ?>
<?php include 'navBar.php'; ?>

<body>
<div class="card p-4">
        <h2 class="text-center mb-4">Update Tag</h2>
        <hr>
<div class="container mt-5">
    

        <form class="needs-validation" method="post" action="index.php?action=updateTag">
            <div class="form-group">
                <label for="tagId">Tag ID</label>
                <input type="text" class="form-control" id="tagId" name="tag_id" placeholder="Tag ID" value="<?= $tagId; ?>" required readonly>
            </div>

            <div class="form-group">
                <label for="tagName">Update Tag's Name</label>
                <input type="text" class="form-control" id="tagName" name="tag_name" placeholder="Name" value="<?= $tagName; ?>" required>
            </div>

            <div class="form-group">
                <label for="tagDate">Update Date</label>
                <input type="date" class="form-control" id="tagDate" name="tag_date" placeholder="Date of today" value="<?= date('Y-m-d'); ?>" required>
            </div>

            <button class="btn btn-primary btn-lg mt-3" name="submit" type="submit">Update</button>
        </form>
    </div>
</div>

</body>
</html>
