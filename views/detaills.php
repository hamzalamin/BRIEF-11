<?php
include 'head.php';
include 'views\navOflog.php';
?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700);

    body {
        font-family: Rubik, sans-serif;
        position: relative;
        font-weight: 400;
        font-size: 15px;
        padding: 20px; /* Added some padding for better spacing */
    }

    ul {
        padding: 0;
        margin: 0;
    }

    li {
        list-style: none;
    }

    a:focus,
    a:hover {
        text-decoration: none;
        -webkit-transition: .3s ease;
        -o-transition: .3s ease;
        transition: .3s ease;
    }

    a:focus {
        outline: 0;
    }

    img {
        max-width: 100%;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: Rubik, sans-serif;
        margin: 0;
        font-weight: 400;
        padding: 0;
        color: #363940;
    }

    p {
        font-size: 16px;
        line-height: 30px;
        color: #898b96;
        font-weight: 300;
        margin-bottom: 15px;
    }

    /* Add other styles based on your card design */
</style>



    <h1>Wiki Details</h1>
<div class="card">
    <div class="card-body">
    <p class="card-title">ID: <?php echo $wikiId; ?></p>
    <p class="card-text">Name: <?php echo $name; ?></p>
    <p class="card-text">Contenu: <?php echo $contenu; ?></p>
    <p class="card-text">Category: <?php echo $category['category_name']; ?></p>
    <p class="card-text">User: <?php echo $user->getName(); ?></p>
    <p class="card-text">Wiki Date: <?php echo $wiki_date; ?></p>
    </div>
</div>

</body>
</html>
