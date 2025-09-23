<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ICRP Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
            background-color: #f8f9fa;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        ul {
            list-style: none;
        }
        
        img {
            max-width: 100%;
            height: auto;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 4px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        
        .btn-primary {
            background-color: #1b5e20;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2e7d32;
        }
        
        .btn-outline {
            border: 2px solid #1b5e20;
            color: #1b5e20;
            background: transparent;
        }
        
        .btn-outline:hover {
            background-color: #1b5e20;
            color: white;
        }
        
        /* Header Styles */
        #header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        #header.scrolled {
            padding: 10px 0;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            cursor: pointer;
        }
        
        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: #1b5e20;
        }
        
        /* Mobile Navigation Toggle */
        .nav-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 1001;
        }
        
        .nav-toggle span {
            display: block;
            height: 3px;
            width: 100%;
            background-color: #1b5e20;
            margin: 2px 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        /* Navigation Styles */
        nav {
            display: flex;
            align-items: center;
        }
        
        nav ul {
            display: flex;
            gap: 25px;
        }
        
        nav ul li a {
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        nav ul li a:hover {
            color: #1b5e20;
        }
        
        .auth-buttons {
            display: flex;
            gap: 15px;
        }
        
        /* Main Content */
        .main-content {
            padding: 100px 0 60px;
            min-height: 100vh;
        }
        
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .left-panel {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .left-panel h2 {
            color: #1b5e20;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }
        
        .left-panel p {
            margin-bottom: 25px;
            color: #555;
        }
        
        .left-panel img {
            width: 100%;
            border-radius: 8px;
        }
        
        .right-panel {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .form-title {
            color: #1b5e20;
            margin-bottom: 25px;
            font-size: 1.8rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #1b5e20;
            outline: none;
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        
        .error {
            display: block;
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .password-hint {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        
        .form-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .form-btn-primary {
            background-color: #1b5e20;
            color: white;
        }
        
        .form-btn-primary:hover {
            background-color: #2e7d32;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .login-link a {
            color: #1b5e20;
            font-weight: 500;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .success-message i {
            margin-right: 10px;
        }
        
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            /* Header and Navigation */
            .header-container {
                padding: 15px;
            }
            
            .nav-toggle {
                display: flex;
            }
            
            /* Navigation when active */
            nav.active {
                transform: translateX(0);
            }
            
            nav {
                position: fixed;
                top: 0;
                right: 0;
                width: 70%;
                height: 100vh;
                background-color: white;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transform: translateX(100%);
                transition: transform 0.4s ease-in-out;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
                z-index: 999;
            }
            
            nav ul {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }
            
            nav ul li a {
                font-size: 1.2rem;
            }
            
            .auth-buttons {
                flex-direction: column;
                margin-top: 30px;
            }
            
            .desktop-auth {
                display: none;
            }
            
            /* Main Content */
            .main-content {
                padding: 90px 0 40px;
            }
            
            .container {
                flex-direction: column;
                gap: 30px;
                padding: 0 15px;
            }
            
            .left-panel, .right-panel {
                padding: 25px 20px;
            }
            
            .left-panel h2, .form-title {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .logo-text {
                font-size: 20px;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
            
            .left-panel, .right-panel {
                padding: 20px 15px;
            }
            
            .form-title {
                font-size: 1.4rem;
            }
            
            .form-control {
                padding: 10px 12px;
                font-size: 14px;
            }
            
            .form-btn {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header id="header">
        <div class="header-container">
            <div class="logo" onclick="window.location.href='index.html';">
                <div class="logo-text">ICRP</div>
            </div>

            <div class="nav-toggle" id="navToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <nav id="mainNav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                
                <div class="auth-buttons">
                    <a href="myIDlogin.html" class="btn btn-outline">Login</a>
                    <a href="register.php" class="btn btn-primary">Register</a>
                </div>
            </nav>
            
            <div class="auth-buttons desktop-auth">
                <a href="myIDlogin.html" class="btn btn-outline">Login</a>
                <a href="register.php" class="btn btn-primary">Register</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="left-panel">
                <h2>Join ICRP Portal</h2>
                <p>Register now to access our comprehensive corporate registration services and streamline your business operations.</p>
                <img src="https://placehold.co/300x200/1b5e20/ffffff/png?text=ICRP+Registration" alt="Registration">
            </div>

            <div class="right-panel">
                <h2 class="form-title">Create Account</h2>

                <?php
                // Simulating PHP output for demonstration
                $fullname = "";
                $email = "";
                $mobile = "";
                $gender = "";
                $address = "";
                $password = "";
                $confirm_password = "";
                
                $fullname_err = "";
                $email_err = "";
                $mobile_err = "";
                $gender_err = "";
                $address_err = "";
                $password_err = "";
                $confirm_password_err = "";
                
                $registration_success = false;
                ?>

                <?php if ($registration_success): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i> Registration successful! You can now login.
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" class="form-control <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullname; ?>" placeholder="Enter your full name">
                        <span class="error"><?php echo $fullname_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Enter your email">
                        <span class="error"><?php echo $email_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control <?php echo (!empty($mobile_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile; ?>" placeholder="Enter your mobile number">
                        <span class="error"><?php echo $mobile_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>">
                            <option value="">Select Gender</option>
                            <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>Male</option>
                            <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>Female</option>
                        </select>
                        <span class="error"><?php echo $gender_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" placeholder="Enter your full address"><?php echo $address; ?></textarea>
                        <span class="error"><?php echo $address_err; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Create a password">
                        <span class="error"><?php echo $password_err; ?></span>
                        <div class="password-hint">Must be at least 8 characters with uppercase, lowercase, number, and special character.</div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirm your password">
                        <span class="error"><?php echo $confirm_password_err; ?></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-btn form-btn-primary">Register</button>
                    </div>

                    <div class="login-link">
                        Already have an account? <a href="login.html">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Mobile navigation toggle
        const navToggle = document.getElementById('navToggle');
        const mainNav = document.getElementById('mainNav');
        
        navToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            
            // Animate hamburger icon
            const spans = navToggle.querySelectorAll('span');
            if (mainNav.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
        
        // Close mobile nav when clicking outside
        document.addEventListener('click', function(event) {
            if (mainNav.classList.contains('active') && 
                !event.target.closest('#mainNav') && 
                !event.target.closest('#navToggle')) {
                mainNav.classList.remove('active');
                
                // Reset hamburger icon
                const spans = navToggle.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
        
        // Header scroll effect
        const header = document.getElementById('header');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Client-side validation for better UX
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Validate full name
                const fullname = document.getElementById('fullname');
                if (!fullname.value.trim()) {
                    showError(fullname, 'Please enter your full name');
                    isValid = false;
                } else if (!/^[a-zA-Z ]*$/.test(fullname.value)) {
                    showError(fullname, 'Only letters and spaces allowed');
                    isValid = false;
                } else {
                    clearError(fullname);
                }

                // Validate email
                const email = document.getElementById('email');
                if (!email.value.trim()) {
                    showError(email, 'Please enter your email address');
                    isValid = false;
                } else if (!isValidEmail(email.value)) {
                    showError(email, 'Please enter a valid email address');
                    isValid = false;
                } else {
                    clearError(email);
                }

                // Validate mobile
                const mobile = document.getElementById('mobile');
                if (!mobile.value.trim()) {
                    showError(mobile, 'Please enter your mobile number');
                    isValid = false;
                } else if (!/^[0-9]{10,15}$/.test(mobile.value)) {
                    showError(mobile, 'Please enter a valid mobile number');
                    isValid = false;
                } else {
                    clearError(mobile);
                }

                // Validate gender
                const gender = document.getElementById('gender');
                if (!gender.value) {
                    showError(gender, 'Please select your gender');
                    isValid = false;
                } else {
                    clearError(gender);
                }

                // Validate address
                const address = document.getElementById('address');
                if (!address.value.trim()) {
                    showError(address, 'Please enter your address');
                    isValid = false;
                } else {
                    clearError(address);
                }

                // Validate password
                const password = document.getElementById('password');
                if (!password.value) {
                    showError(password, 'Please enter a password');
                    isValid = false;
                } else if (password.value.length < 8) {
                    showError(password, 'Password must have at least 8 characters');
                    isValid = false;
                } else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/.test(password.value)) {
                    showError(password, 'Password must contain uppercase, lowercase, number, and special character');
                    isValid = false;
                } else {
                    clearError(password);
                }

                // Validate confirm password
                const confirmPassword = document.getElementById('confirm_password');
                if (!confirmPassword.value) {
                    showError(confirmPassword, 'Please confirm password');
                    isValid = false;
                } else if (password.value !== confirmPassword.value) {
                    showError(confirmPassword, 'Passwords do not match');
                    isValid = false;
                } else {
                    clearError(confirmPassword);
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });

            function showError(input, message) {
                clearError(input);
                input.classList.add('is-invalid');
                const errorDiv = document.createElement('span');
                errorDiv.className = 'error';
                errorDiv.textContent = message;
                input.parentNode.appendChild(errorDiv);
            }

            function clearError(input) {
                input.classList.remove('is-invalid');
                const errorDiv = input.parentNode.querySelector('.error');
                if (errorDiv) {
                    errorDiv.remove();
                }
            }

            function isValidEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        });
    </script>
</body>

</html>