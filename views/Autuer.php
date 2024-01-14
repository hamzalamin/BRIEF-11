<?php
include 'head.php';
include 'views\navBarOfAdmin.php';
?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-7 col-lg-8 rounded p-4 shadow" style="max-width: 600px; width: 100%;">
                    <h2 class="text-uppercase text-center mb-5">Your Dashboard</h2>

                    <!-- Your dashboard content goes here -->
                    <div class="mb-4">
                        <!-- Example: Display user information, charts, or any dashboard elements -->
                        <p>Welcome to your dashboard! You can manage your application here.</p>
                    </div>

                    <!-- List of Links -->
                    <div class="list-group mb-4">
                        <a href="index.php?action=tagManagment" class="list-group-item list-group-item-action">Tags Management</a>
                        <a href="index.php?action=categoryManagment" class="list-group-item list-group-item-action">Categories Management</a>
                        <a href="index.php?action=wikisManagment" class="list-group-item list-group-item-action">Wikis Management</a>
                        <a href="index.php?action=statistique" class="list-group-item list-group-item-action">statistique</a>

                        <!-- Add more categories -->
                    </div>

                    <!-- Logout button -->
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
