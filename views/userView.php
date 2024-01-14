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
                <div class="invalid-feedback" id="usernameValidationFeedback">
                    Your Name is required.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInEmail" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="signInEmail" name="email" placeholder="Your Email" required>
                <div class="invalid-feedback" id="emailValidationFeedback">
                    Please enter a valid email.
                </div>
            </div>

            <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="signInPassword" placeholder="Password" required>
                <div class="invalid-feedback" id="passwordValidationFeedback">
                    Your password is required.
                </div>
            </div>

            <div class="form-check d-flex justify-content-center mb-5">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" required/>
                <label class="form-check-label" for="form2Example3g">
                    I agree to all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                </label>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <button class="btn btn-success btn-lg w-100" name="submit" type="submit" id="submitButton">Register</button>
                </div>
            </div>

            <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="index.php?action=login" class="fw-bold text-body"><u>Login here</u></a></p>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const usernameInput = document.getElementById('signInName');
                    const emailInput = document.getElementById('signInEmail');
                    const passwordInput = document.getElementById('signInPassword');
                    const submitButton = document.getElementById('submitButton');
                    const usernameValidationFeedback = document.getElementById('usernameValidationFeedback');
                    const emailValidationFeedback = document.getElementById('emailValidationFeedback');
                    const passwordValidationFeedback = document.getElementById('passwordValidationFeedback');

                    const usernamePattern = /^(?!^[0-9]+$)[a-zA-Z0-9\s]+$/;
                    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    const passwordPattern = /^(?=.*[a-zA-Z\d]).{3,}$/;


                    usernameInput.addEventListener('input', function () {
                        if (!usernamePattern.test(usernameInput.value)) {
                            usernameInput.setCustomValidity('Invalid characters in your name.');
                            usernameValidationFeedback.style.display = 'block';
                        } else {
                            usernameInput.setCustomValidity('');
                            usernameValidationFeedback.style.display = 'none';
                        }
                    });

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
                            passwordInput.setCustomValidity('Password must have at least 3 characters.');
                            passwordValidationFeedback.style.display = 'block';
                        } else {
                            passwordInput.setCustomValidity('');
                            passwordValidationFeedback.style.display = 'none';
                        }
                    });

                    submitButton.addEventListener('click', function (event) {
                        if (!usernamePattern.test(usernameInput.value) || !emailPattern.test(emailInput.value) || !passwordPattern.test(passwordInput.value)) {
                            event.preventDefault(); // Prevent form submission if validation fails
                        }
                    });
                });
            </script>
        </form>
    </div>
</body>
</html>
