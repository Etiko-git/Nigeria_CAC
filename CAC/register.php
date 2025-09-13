<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ICRP Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-dark: #1b5e20;
            --primary-light: #4caf50;
            --accent: #ffc107;
            --light: #f8f9fa;
            --dark: #343a40;
            --error: #f44336;
            --success: #4caf50;
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        h1, h2, h3, h4, h5 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        
        /* Header Styles */
        header {
            background: var(--gradient);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        header.scrolled {
            padding: 0.5rem 2rem;
            background: rgba(46, 125, 50, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .logo-text {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 1.8rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            position: relative;
            font-size: 1.1rem;
        }
        
        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent);
            transition: width 0.3s ease;
        }
        
        nav ul li a:hover:after {
            width: 100%;
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
        }
        
        .btn-outline:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary {
            background: white;
            color: var(--primary);
            border: 2px solid white;
        }
        
        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-accent {
            background: var(--accent);
            color: var(--dark);
            border: 2px solid var(--accent);
        }
        
        .btn-accent:hover {
            background: #ffb300;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Main Content */
        .main-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    position: relative;
    background: url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80') 
                no-repeat center center;
    background-size: cover;
}

.main-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9); /* overlay */
    z-index: 1;
}

.main-content > * {
    position: relative;
    z-index: 2; /* keep content above overlay */
}

        
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            overflow: hidden;
            display: flex;
            margin-top: 20px;
        }
        
        .left-panel {
            flex: 1;
            background: var(--gradient);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .left-panel h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }
        
        .left-panel p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .left-panel img {
            max-width: 100%;
            margin-top: 20px;
        }
        
        .right-panel {
            flex: 1.2;
            padding: 40px;
        }
        
        .form-title {
            color: var(--primary);
            margin-bottom: 30px;
            text-align: center;
            font-size: 2rem;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
        }
        
        .error {
            color: var(--error);
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-btn {
            padding: 12px 20px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            width: 100%;
            font-size: 1.1rem;
            border: none;
        }
        
        .form-btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .form-btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .password-hint {
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 3rem 2rem 2rem;
            position: relative;
            margin-top: auto;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%232e7d32" fill-opacity="0.1" d="M0,128L48,117.3C96,107,192,85,288,112C384,139,480,213,576,218.7C672,224,768,160,864,138.7C960,117,1056,139,1152,149.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }
        
        .footer-column h3 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.8rem;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--accent);
            border-radius: 2px;
        }
        
        .footer-column p {
            color: #ccc;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-column ul li a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .footer-column ul li a:hover {
            color: white;
            padding-left: 8px;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }
        
        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-5px);
        }
        
        .contact-info {
            list-style: none;
        }
        
        .contact-info li {
            display: flex;
            align-items: center;
            margin-bottom: 1.2rem;
            color: #ccc;
        }
        
        .contact-info li i {
            margin-right: 1rem;
            color: var(--primary-light);
            font-size: 1.2rem;
            width: 20px;
        }
        
        .copyright {
            text-align: center;
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #999;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel {
                padding: 30px 20px;
            }
            
            .right-panel {
                padding: 30px 20px;
            }
            
            nav ul {
                margin-top: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0.5rem;
            }
            
            .auth-buttons {
                margin-top: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="header-container">
            <div class="logo">
                <div class="logo-text">ICRP</div>
            </div>
            
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html#services">Services</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            
            <div class="auth-buttons">
                <a href="login.html" class="btn btn-outline">Login</a>
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
                require "db.php";
                
                // Initialize variables
                $fullname = $email = $mobile = $gender = $address = $password = $confirm_password = "";
                $fullname_err = $email_err = $mobile_err = $gender_err = $address_err = $password_err = $confirm_password_err = "";
                $registration_success = false;
                
                // Process form data when form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    // Validate full name
                    if (empty(trim($_POST["fullname"]))) {
                        $fullname_err = "Please enter your full name.";
                    } else {
                        $fullname = trim($_POST["fullname"]);
                        if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
                            $fullname_err = "Only letters and spaces allowed.";
                        }
                    }
                    
                    // Validate email
                    if (empty(trim($_POST["email"]))) {
                        $email_err = "Please enter your email address.";
                    } else {
                        $email = trim($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $email_err = "Please enter a valid email address.";
                        } else {
                            // Check if email already exists
                            $sql = "SELECT id FROM users WHERE email = ?";
                            if ($stmt = $conn->prepare($sql)) {
                                $stmt->bind_param("s", $param_email);
                                $param_email = $email;
                                
                                if ($stmt->execute()) {
                                    $stmt->store_result();
                                    
                                    if ($stmt->num_rows == 1) {
                                        $email_err = "This email is already registered.";
                                    }
                                }
                                $stmt->close();
                            }
                        }
                    }
                    
                    // Validate mobile
                    if (empty(trim($_POST["mobile"]))) {
                        $mobile_err = "Please enter your mobile number.";
                    } else {
                        $mobile = trim($_POST["mobile"]);
                        if (!preg_match("/^[0-9]{10,15}$/", $mobile)) {
                            $mobile_err = "Please enter a valid mobile number.";
                        }
                    }
                    
                    // Validate gender
                    if (empty(trim($_POST["gender"]))) {
                        $gender_err = "Please select your gender.";
                    } else {
                        $gender = trim($_POST["gender"]);
                    }
                    
                    // Validate address
                    if (empty(trim($_POST["address"]))) {
                        $address_err = "Please enter your address.";
                    } else {
                        $address = trim($_POST["address"]);
                    }
                    
                    // Validate password
                    if (empty(trim($_POST["password"]))) {
                        $password_err = "Please enter a password.";
                    } else {
                        $password = trim($_POST["password"]);
                        if (strlen($password) < 8) {
                            $password_err = "Password must have at least 8 characters.";
                        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/", $password)) {
                            $password_err = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
                        }
                    }
                    
                    // Validate confirm password
                    if (empty(trim($_POST["confirm_password"]))) {
                        $confirm_password_err = "Please confirm password.";
                    } else {
                        $confirm_password = trim($_POST["confirm_password"]);
                        if (empty($password_err) && ($password != $confirm_password)) {
                            $confirm_password_err = "Passwords did not match.";
                        }
                    }
                    
                    // Check input errors before inserting in database
                    if (empty($fullname_err) && empty($email_err) && empty($mobile_err) && 
                        empty($gender_err) && empty($address_err) && empty($password_err) && 
                        empty($confirm_password_err)) {
                        
                        // Prepare an insert statement
                        $sql = "INSERT INTO users (fullname, email, mobile, gender, address, password) VALUES (?, ?, ?, ?, ?, ?)";
                        
                        if ($stmt = $conn->prepare($sql)) {
                            // Bind variables to the prepared statement as parameters
                            $stmt->bind_param("ssssss", $param_fullname, $param_email, $param_mobile, $param_gender, $param_address, $param_password);
                            
                            // Set parameters
                            $param_fullname = $fullname;
                            $param_email = $email;
                            $param_mobile = $mobile;
                            $param_gender = $gender;
                            $param_address = $address;
                            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                            
                            // Attempt to execute the prepared statement
                            if ($stmt->execute()) {
                                $registration_success = true;
                                
                                // Reset form values
                                $fullname = $email = $mobile = $gender = $address = $password = $confirm_password = "";
                            } else {
                                echo "Something went wrong. Please try again later.";
                            }
                            
                            // Close statement
                            $stmt->close();
                        }
                    }
                    
                    // Close connection
                    $conn->close();
                }
                ?>
                
                <?php if ($registration_success): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i> Registration successful! You can now login.
                    </div>
                <?php endif; ?>
                
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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