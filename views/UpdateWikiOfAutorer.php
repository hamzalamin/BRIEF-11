<?php include 'head.php'; ?>
<?php include 'navBar.php'; ?>

<body>
<div class="card p-4">
        <h2 class="text-center mb-4">Update wiki</h2>
        <hr>
<div class="container mt-5">
    

        <form class="needs-validation" method="post" action="index.php?action=updatewiki">
            <div class="form-group">
                <label for="wikiId">wiki ID</label>
                <input type="text" class="form-control" id="wikiId" name="wiki_id" placeholder="wiki ID" value="<?= $wikiId; ?>" required readonly>
            </div>

            <div class="form-group">
                <label for="wikiName">Update wiki's Name</label>
                <input type="text" class="form-control" id="wikiName" name="wiki_name" placeholder="Name" value="<?= $name; ?>" required>
            </div>
            <div class="form-group">
    <label for="wiki_contenu">Update wiki's Content</label>
    <textarea class="form-control" id="wiki_contenu" name="wiki_contenu" rows="5" placeholder="Wiki Content" required><?= $contenu; ?></textarea>
</div>




            <div class="form-group">
                <label for="wikiDate">Update Date</label>
                <input type="date" class="form-control" id="wikiDate" name="wiki_date" placeholder="Date of today" value="<?= date('Y-m-d'); ?>" required>
            </div>

            <button class="btn btn-primary btn-lg mt-3" name="submit" type="submit">Update</button></a>
        </form>
    </div>
</div>

</body>
</html>
