<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand m-0 float-start" href="#">Your WikiSite</a>

    <button class="navbar-toggler light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
        data-toggle="collapse" data-target="#main-navbar">
        <span></span>
    </button>

    <div class="collapse navbar-collapse" id="main-navbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=homeView.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=logout">Log Out <span class="sr-only"></span></a>
            </li>

            <?php
                if (isset($_SESSION['user']) && isset($_SESSION['user']['role'])) {
                    $userRole = $_SESSION['user']['role'];

                    if ($userRole == 1) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="index.php?action=dashboard_form_">Dashboard</a>
                            </li>';
                    }
                }
            ?>
        </ul>
    </div>
</nav>
