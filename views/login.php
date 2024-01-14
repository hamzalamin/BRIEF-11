<?php
include 'head.php';
?>
<?php
include 'head.php';
?>

<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="col-md-7 col-lg-8 rounded p-4 shadow" style="max-width: 400px; width: 100%;">
        <h4 class="text-center">LOG IN</h4>
        <form class="needs-validation" method="post" action="index.php?action=admin">
            <div class="mb-3">
                <label for="signInEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="signInEmail" name="email" placeholder="Your Email" required>
                <div class="invalid-feedback" id="emailValidationFeedback">
                    Please enter a valid email.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="signInPassword" placeholder="Your password" required>
                <div class="invalid-feedback" id="passwordValidationFeedback">
                    Password must meet the specified criteria.
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <a href="index.php?action=dashboard_form_"><button class="btn btn-success btn-lg w-100" name="submit" type="submit" id="submitButton">Sign</button></a>
                </div>
            </div>

            <p class="text-center text-muted mt-5 mb-0">Create an account <a href="index.php?action=rege" class="fw-bold text-body"><u>Login here</u></a></p>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const emailInput = document.getElementById('signInEmail');
                const passwordInput = document.getElementById('signInPassword');
                const submitButton = document.getElementById('submitButton');
                const emailValidationFeedback = document.getElementById('emailValidationFeedback');
                const passwordValidationFeedback = document.getElementById('passwordValidationFeedback');

                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const passwordPattern = /^(?=.*[a-zA-Z\d]).{3,}$/;

                emailInput.addEventListener('input', function () {
                    if (!emailPattern.test(emailInput.value)) {
                        emailInput.setCustomValidity('Please enter a valid email.');
                        emailValidationFeedback.style.display = 'block';
                    } else {
                        emailInput.setCustomValidity('');
                        emailValidationFeedback.style.display = 'none';
                    }
                });

                passwordInput.addEventListener('input', function () {
                    if (!passwordPattern.test(passwordInput.value)) {
                        passwordInput.setCustomValidity('Password must meet the specified criteria.');
                        passwordValidationFeedback.style.display = 'block';
                    } else {
                        passwordInput.setCustomValidity('');
                        passwordValidationFeedback.style.display = 'none';
                    }
                });

                submitButton.addEventListener('click', function (event) {
                    if (!emailPattern.test(emailInput.value) || !passwordPattern.test(passwordInput.value)) {
                        event.preventDefault(); // Prevent form submission if validation fails
                    }
                });
            });
        </script>
    </div>
</body>
</html>
