<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: myIDlogin.html?a=sessionexpired");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CAC ICRP Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo" onclick="window.location.href='index.html';">
                <img src="img/logo.jpg" alt="CAC Nigeria Logo" class="logo-img">
                <div class="logo-text">
                    <span class="logo-main">CAC</span>
                    <span class="logo-sub">ICRP Portal</span>
                </div>
            </div>
            
            <!-- Desktop Navigation -->
            <nav id="mainNav">
                <ul>
                    <li><a href="home.php" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="service.php"><i class="fas fa-cogs"></i> Services</a></li>
                    <li><a href="#"><i class="fas fa-building"></i> Business Registration</a></li>
                    <li><a href="#"><i class="fas fa-file-contract"></i> Compliance</a></li>
                    <li><a href="#"><i class="fas fa-headset"></i> Support</a></li>
                </ul>
            </nav>
            
            <!-- User Menu with Avatar Dropdown -->
            <div class="user-menu">
                <div class="user-avatar-dropdown">
                    <div class="avatar-container" id="avatarDropdown">
                        <div class="avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="username-desktop">
                            <?php echo isset($_SESSION['fullname']) ? htmlspecialchars($_SESSION['fullname']) : 'User'; ?>
                        </span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </div>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <div class="dropdown-header">
                            <div class="dropdown-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="dropdown-user-info">
                                <div class="dropdown-username">
                                    <?php echo isset($_SESSION['fullname']) ? htmlspecialchars($_SESSION['fullname']) : 'User'; ?>
                                </div>
                                <div class="dropdown-email">
                                    <?php #echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'user@example.com'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="profile.php" class="dropdown-item">
                            <i class="fas fa-user-edit"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="my-businesses.php" class="dropdown-item">
                            <i class="fas fa-briefcase"></i>
                            <span>My Businesses</span>
                        </a>
                        <a href="settings.php" class="dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Account Settings</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="help.php" class="dropdown-item">
                            <i class="fas fa-question-circle"></i>
                            <span>Help & Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
                
                <!-- Mobile Navigation Toggle - Moved after username -->
                <div class="nav-toggle" id="navToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="dashboard">
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="welcome-content">
                <h1 class="welcome-title">
                    <span class="greeting">Good 
                        <?php 
                        $hour = date('H');
                        if ($hour < 12) echo 'Morning';
                        elseif ($hour < 18) echo 'Afternoon';
                        else echo 'Evening';
                        ?>
                    </span>,
                    <?php echo isset($_SESSION['fullname']) ? htmlspecialchars($_SESSION['fullname']) : 'User'; ?>!
                </h1>
                <p class="welcome-subtitle">Welcome to your Corporate Affairs Commission Dashboard</p>
                
            </div>
            <div class="welcome-illustration">
                <i class="fas fa-landmark"></i>
            </div>
        </div>

        <!-- Quick Actions -->
        <section class="quick-actions-section">
            <h2 class="section-title">Quick Actions</h2>
            <div class="actions-grid">
                <div class="action-card primary">
                    <div class="action-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="action-content">
                        <h3>Register New Business</h3>
                        <p>Start a new business name or company registration</p>
                        <a href="#" class="btn-action">Get Started</a>
                    </div>
                </div>
                
                <div class="action-card secondary">
                    <div class="action-icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="action-content">
                        <h3>File Annual Returns</h3>
                        <p>Submit your annual returns and compliance documents</p>
                        <a href="#" class="btn-action">File Now</a>
                    </div>
                </div>
                
                <div class="action-card accent">
                    <div class="action-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="action-content">
                        <h3>Name Availability Search</h3>
                        <p>Check if your proposed business name is available</p>
                        <a href="#" class="btn-action">Search Name</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Services Grid -->
        <section class="services-section">
            <h2 class="section-title">Business Registration Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-registered"></i>
                    </div>
                    <h3>Business Name Registration</h3>
                    <p>Register your business name for sole proprietorships and partnerships</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Fast processing (24-48 hours)</li>
                        <li><i class="fas fa-check"></i> Online certificate delivery</li>
                        <li><i class="fas fa-check"></i> ₦10,000 registration fee</li>
                    </ul>
                    <a href="#" class="btn-service">Register Business Name</a>
                </div>
                
                <div class="service-card featured">
                    <div class="service-badge">Most Popular</div>
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Private Limited Company</h3>
                    <p>Incorporate a private company limited by shares</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Limited liability protection</li>
                        <li><i class="fas fa-check"></i> Separate legal entity</li>
                        <li><i class="fas fa-check"></i> ₦20,000 registration fee</li>
                    </ul>
                    <a href="#" class="btn-service">Incorporate Company</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Incorporated Trustees</h3>
                    <p>Register NGOs, religious organizations, and associations</p>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> For non-profit organizations</li>
                        <li><i class="fas fa-check"></i> Legal entity status</li>
                        <li><i class="fas fa-check"></i> ₦15,000 registration fee</li>
                    </ul>
                    <a href="#" class="btn-service">Register Trustees</a>
                </div>
            </div>
        </section>

        <!-- Recent Activity & Notifications -->
        <div class="dashboard-grid">
            <!-- Recent Activity -->
            <div class="activity-section">
                <div class="section-header">
                    <h3>Recent Activity</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="activity-list">
                    <div class="activity-item success">
                        <div class="activity-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Business Name Approved</div>
                            <div class="activity-desc">"Tech Solutions NG" has been registered successfully</div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>
                    
                    <div class="activity-item warning">
                        <div class="activity-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Annual Returns Due</div>
                            <div class="activity-desc">Your annual return for ABC Enterprises is due in 30 days</div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>
                    
                    <div class="activity-item info">
                        <div class="activity-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Document Uploaded</div>
                            <div class="activity-desc">Memorandum of Association uploaded for review</div>
                            <div class="activity-time">3 days ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CAC Updates -->
            <div class="updates-section">
                <div class="section-header">
                    <h3>CAC Updates & Announcements</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
                <div class="updates-list">
                    <div class="update-item important">
                        <div class="update-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="update-content">
                            <div class="update-title">New CAMA 2020 Regulations</div>
                            <div class="update-desc">Important updates to Company Regulations effective January 2024</div>
                            <div class="update-time">Posted 5 days ago</div>
                        </div>
                    </div>
                    
                    <div class="update-item">
                        <div class="update-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="update-content">
                            <div class="update-title">Public Holiday Notice</div>
                            <div class="update-desc">CAC offices will be closed on December 25th for Christmas</div>
                            <div class="update-time">Posted 1 week ago</div>
                        </div>
                    </div>
                    
                    <div class="update-item">
                        <div class="update-icon">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <div class="update-content">
                            <div class="update-title">System Maintenance</div>
                            <div class="update-desc">Scheduled maintenance on Saturday 8 PM - 10 PM</div>
                            <div class="update-time">Posted 2 weeks ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Support Section -->
        <section class="support-section">
            <div class="support-content">
                <div class="support-info">
                    <h2>Need Help with Your Registration?</h2>
                    <p>Our support team is available to assist you with any questions about business registration, compliance, or document filing.</p>
                    <div class="support-options">
                        <div class="support-option">
                            <i class="fas fa-phone"></i>
                            <div>
                                <strong>Call Us</strong>
                                <span>+234 700 2255 2267</span>
                            </div>
                        </div>
                        <div class="support-option">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <strong>Email Us</strong>
                                <span>support@cac.gov.ng</span>
                            </div>
                        </div>
                        <div class="support-option">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong>Visit Office</strong>
                                <span>Plot 1178, Shehu Shagari Way, Abuja</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="support-illustration">
                    <i class="fas fa-headset"></i>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-main">
                <div class="footer-brand">
                    <img src="img/logo.jpg" alt="CAC Nigeria Logo" class="footer-logo">
                    <div class="footer-brand-text">
                        <h3>Corporate Affairs Commission</h3>
                        <p>Federal Republic of Nigeria</p>
                    </div>
                </div>
                <div class="footer-links">
                    <div class="footer-column">
                        <h4>Services</h4>
                        <a href="business-registration.php">Business Registration</a>
                        <a href="compliance.php">Compliance Filing</a>
                        <a href="name-search.php">Name Availability</a>
                        <a href="documents.php">Document Services</a>
                    </div>
                    <div class="footer-column">
                        <h4>Support</h4>
                        <a href="help.php">Help Center</a>
                        <a href="faq.php">FAQs</a>
                        <a href="contact.php">Contact Us</a>
                        <a href="status.php">Check Application Status</a>
                    </div>
                    <div class="footer-column">
                        <h4>Legal</h4>
                        <a href="terms.php">Terms of Service</a>
                        <a href="privacy.php">Privacy Policy</a>
                        <a href="cama.php">CAMA 2020</a>
                        <a href="regulations.php">Regulations</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; 2024 Corporate Affairs Commission, Nigeria. All rights reserved.
                </div>
                <div class="footer-social">
                    <span>Follow CAC:</span>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const avatarDropdown = document.getElementById('avatarDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const navToggle = document.getElementById('navToggle');
            const mainNav = document.getElementById('mainNav');
            const overlay = document.createElement('div');
            
            // Create overlay for closing dropdowns
            overlay.className = 'overlay';
            document.body.appendChild(overlay);
            
            // Toggle dropdown menu
            avatarDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('active');
                overlay.classList.toggle('active');
            });
            
            // Toggle mobile navigation
            navToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                navToggle.classList.toggle('active');
                mainNav.classList.toggle('active');
                overlay.classList.toggle('active');
            });
            
            // Close dropdowns when clicking outside
            overlay.addEventListener('click', function() {
                dropdownMenu.classList.remove('active');
                navToggle.classList.remove('active');
                mainNav.classList.remove('active');
                overlay.classList.remove('active');
            });
            
            // Close dropdown when clicking on dropdown items
            dropdownMenu.addEventListener('click', function(e) {
                if (!e.target.closest('.logout')) {
                    dropdownMenu.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });

            // Add active state to navigation items
            const navItems = document.querySelectorAll('nav ul li a');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
    
    <!-- Watermark overlay -->
<div id="watermark">
  TESTING SITE - NOT OFFICIAL
</div>

<!-- Marquee banner at bottom -->
<div id="marquee-banner">
  <div class="marquee-content">
    <span>⚠️ THIS IS A TESTING SITE - NOT AN OFFICIAL CAC PORTAL ⚠️</span>
    <span>⚠️ THIS IS A TESTING SITE - NOT AN OFFICIAL CAC PORTAL ⚠️</span>
    <span>⚠️ THIS IS A TESTING SITE - NOT AN OFFICIAL CAC PORTAL ⚠️</span>
  </div>
</div>
</body>
</html>
