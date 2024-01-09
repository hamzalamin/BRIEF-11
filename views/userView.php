<?php
include 'head.php';
include 'navBar.php';
include '../controllers/userController.php';
?>

<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="col-md-7 col-lg-8 rounded p-4 shadow" style="max-width: 400px; width: 100%;">
        <h4 class="text-center">SIGN IN</h4>
        <form class="needs-validation" method="post" action="index.php?action=regester" novalidate>
            <div class="mb-3">
                <label for="signInEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="signInEmail" name="email" placeholder="Your Email" required>
                <div class="invalid-feedback">
                    Please enter a valid email.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInName" class="form-label">Name</label>
                <input type="text" class="form-control" id="signInName" name="name" placeholder="Your name" required>
                <div class="invalid-feedback">
                    Please enter a valid name.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="signInPassword" placeholder="Your password" required>
                <div class="invalid-feedback">
                    Your password is required.
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg w-100" name="submit" type="submit">Sign In</button>
                </div>
                <div class="col-md-6">
                    <p class="text-center">Create an account <a href="signUp.php">Sign Up</a></p>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
