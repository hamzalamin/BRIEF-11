<?php
include 'head.php';
?>

<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="col-md-7 col-lg-8 rounded p-4 shadow" style="max-width: 400px; width: 100%;">
        <h4 class="text-center">Create an account</h4>
        <form class="needs-validation" method="post" action="index.php?action=register" novalidate>
            <div class="mb-3">
                <label for="signInName" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="signInName" name="username" placeholder="Your Name" required>
                <div class="invalid-feedback">
                    Your Name is required.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInEmail" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="signInEmail" name="email" placeholder="Your Email" required>
                <div class="invalid-feedback">
                    Please enter a valid email.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="signInPassword" placeholder="Password" required>
                <div class="invalid-feedback">
                    Your password is required.
                </div>
            </div>

            <div class="form-check d-flex justify-content-center mb-5">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                <label class="form-check-label" for="form2Example3g">
                    I agree to all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                </label>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <button class="btn btn-success btn-lg w-100" name="submit" type="submit">Register</button>
                </div>
            </div>

            <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="index.php?action=login" class="fw-bold text-body"><u>Login here</u></a></p>
        </form>
    </div>

</body>
</html>
