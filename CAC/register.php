<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ICRP Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header id="header">
        <div class="header-container">
            <div class="logo" onclick="window.location.href='index.html';">
                <div class="logo-text">ICRP</div>
            </div>

            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
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
                    if (
                        empty($fullname_err) && empty($email_err) && empty($mobile_err) &&
                        empty($gender_err) && empty($address_err) && empty($password_err) &&
                        empty($confirm_password_err)
                    ) {

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