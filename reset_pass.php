
<?php 
// Start session
session_start();
include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 450px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 120px;
            height: 120px;
            background-color: #6c63ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
            font-size: 48px;
        }
        .form-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
        }
        .form-control:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        }
        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
            padding: 12px 20px;
            font-weight: 500;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #5a52d5;
            border-color: #5a52d5;
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 10px;
            color: #6c757d;
        }
        .input-group .form-control {
            border-right: none;
        }
        .input-group-text {
            background-color: transparent;
            border-left: none;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider span {
            padding: 0 10px;
            color: #6c757d;
        }
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            text-decoration: none;
        }
        .social-btn.google {
            background-color: #DB4437;
        }
        .social-btn.facebook {
            background-color: #4267B2;
        }
        .social-btn.apple {
            background-color: #000000;
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <!-- Logo -->
            <div class="logo-container">
                <div class="logo">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            
            <!-- Form Title -->
            <h2 class="form-title">Reset Password</h2>
            
            <!-- Login Form -->
            <form id="loginForm" action="reset_process.php" method="post" >
                <!-- Phone Number Field -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" required>
                    <div class="invalid-feedback">
                        Please enter your phone number.
                    </div>
                </div>
                
                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Current Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="opassword" id="password" placeholder="Enter your Current Password" required>
                        
                    </div>
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="npassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="npassword" id="npassword" placeholder="Enter New Password" required>
                    
                    <!-- Password Strength Meter -->
                    <div class="progress mt-2" style="height: 6px;">
                        <div id="strengthBar" class="progress-bar" role="progressbar"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="cpassword" id="password" placeholder="Enter Confirm Password" required>
                        
                    </div>
                    <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="showPassword">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>

                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                </div>
                
                
                
                <!-- Submit Button -->
                <div class="d-grid gap-2 mb-4">
                    <button class="btn btn-primary" type="submit">Reset Password</button>
                </div>
                
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
    const passwordField = document.getElementById("npassword");
    const strengthBar = document.getElementById("strengthBar");
    const showPassword = document.getElementById("showPassword");

    // Toggle show/hide for all password fields
    showPassword.addEventListener('change', function () {
        const type = this.checked ? "text" : "password";
        document.querySelectorAll("input[type='password']").forEach(el => el.type = type);
    });

    // Password strength logic
    passwordField.addEventListener("input", function () {
        const value = this.value;
        let strength = 0;

        if (value.length > 5) strength += 1;
        if (value.match(/[A-Z]/)) strength += 1;
        if (value.match(/[0-9]/)) strength += 1;
        if (value.match(/[\W]/)) strength += 1;

        // Update progress bar
        strengthBar.classList.remove("bg-danger", "bg-warning", "bg-success");

        if (strength === 0) {
            strengthBar.style.width = "0%";
        } else if (strength <= 1) {
            strengthBar.style.width = "25%";
            strengthBar.classList.add("bg-danger");
        } else if (strength === 2) {
            strengthBar.style.width = "50%";
            strengthBar.classList.add("bg-warning");
        } else if (strength >= 3) {
            strengthBar.style.width = "100%";
            strengthBar.classList.add("bg-success");
        }
    });
</script>
<style>
    #strengthBar {
        transition: width 0.3s ease;
    }
</style>

</body>
</html>
