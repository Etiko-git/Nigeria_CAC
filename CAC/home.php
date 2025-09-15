<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ICRP Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!-- Header -->
    <header>
    <div class="header-container">
            <div class="logo" onclick="window.location.href='index.html';">
                <div class="logo-text">ICRP</div>
            </div>
            
            <div class="user-menu">
                <div class="user-info">
                    <div class="welcome">Welcome back</div>
                    <div class="username">
                        <?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'User'; ?>
                        
                    </div>
                </div>
                <a href="index.html" class="btn btn-logout" onclick="window.location.href='logout.php'">Logout</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="dashboard">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <p class="dashboard-subtitle">Manage your corporate registrations and services</p>
        </div>
        
        <div class="dashboard-grid">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h2 class="card-title">Company Registration</h2>
                </div>
                <div class="card-content">
                    <p>Register your business name, limited liability company, or enterprise with our streamlined process.</p>
                    <div class="quick-actions">
                        <a href="#" class="btn-action">Start Registration</a>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h2 class="card-title">Compliance Filing</h2>
                </div>
                <div class="card-content">
                    <p>File your annual returns and other statutory documents efficiently through our platform.</p>
                    <div class="quick-actions">
                        <a href="#" class="btn-action">File Documents</a>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h2 class="card-title">Name Search</h2>
                </div>
                <div class="card-content">
                    <p>Check the availability of your proposed business name before registration.</p>
                    <div class="quick-actions">
                        <a href="#" class="btn-action">Search Name</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-grid">
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3 class="action-title">Add Team Member</h3>
                    <p class="action-description">Invite colleagues to manage your corporate account</p>
                    <a href="#" class="btn-action">Invite</a>
                </div>
                
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <h3 class="action-title">Download Certificates</h3>
                    <p class="action-description">Access your business registration documents</p>
                    <a href="#" class="btn-action">Download</a>
                </div>
                
                <div class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3 class="action-title">Get Help</h3>
                    <p class="action-description">Find answers to common questions</p>
                    <a href="#" class="btn-action">Support Center</a>
                </div>
            </div>
        </div>
        
        <div class="recent-activity">
            <h2>Recent Activity</h2>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Company registration approved</div>
                        <div class="activity-time">2 hours ago</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-file-upload"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Annual return submitted</div>
                        <div class="activity-time">1 day ago</div>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Profile information updated</div>
                        <div class="activity-time">3 days ago</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">About</a>
                <a href="#">FAQ</a>
                <a href="#">Contact</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="copyright">
                &copy; 2023 Integrated Corporate Registration Portal. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Simple greeting based on time of day
        document.addEventListener('DOMContentLoaded', function() {
            const hour = new Date().getHours();
            const welcome = document.querySelector('.welcome');
            
            if (hour < 12) {
                welcome.textContent = 'Good morning';
            } else if (hour < 18) {
                welcome.textContent = 'Good afternoon';
            } else {
                welcome.textContent = 'Good evening';
            }
        });
    </script>
</body>
</html>