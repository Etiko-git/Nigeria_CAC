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
    <title>Services - CAC ICRP Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <style>
        .services-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            border-radius: var(--radius-lg);
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .services-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .services-hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .services-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        .service-category {
            margin-bottom: 4rem;
        }

        .category-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
        }

        .category-title {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .category-description {
            font-size: 1.1rem;
            color: var(--text-light);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .services-grid-detailed {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .service-card-detailed {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border);
            position: relative;
        }

        .service-card-detailed:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .service-card-detailed.featured {
            border: 2px solid var(--primary);
        }

        .service-badge {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--accent);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .service-icon-large {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gradient-light);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
        }

        .service-title {
            font-size: 1.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            text-align: center;
        }

        .service-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            text-align: center;
        }

        .service-features-detailed {
            list-style: none;
            margin-bottom: 2rem;
        }

        .service-features-detailed li {
            padding: 0.75rem 0;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid var(--border);
        }

        .service-features-detailed li:last-child {
            border-bottom: none;
        }

        .service-features-detailed li i {
            color: var(--success);
            font-size: 1rem;
            width: 20px;
        }

        .service-pricing {
            background: rgba(27, 94, 32, 0.05);
            padding: 1.5rem;
            border-radius: var(--radius);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .price-note {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .service-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn-service-outline {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary);
            color: var(--primary);
            border-radius: var(--radius);
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            flex: 1;
        }

        .btn-service-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .process-step {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow);
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: var(--gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 auto 1.5rem;
        }

        .step-title {
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .step-description {
            color: var(--text-light);
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .services-hero h1 {
                font-size: 2.2rem;
            }

            .services-hero p {
                font-size: 1.1rem;
            }

            .category-title {
                font-size: 2rem;
            }

            .services-grid-detailed {
                grid-template-columns: 1fr;
            }

            .service-actions {
                flex-direction: column;
            }

            .process-steps {
                grid-template-columns: 1fr;
            }
        }
        
/* Watermark Styles */
#watermark {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(-45deg);
  font-size: 60px;
  font-weight: bold;
  color: rgba(255, 0, 0, 0.15);
  z-index: 9998;
  pointer-events: none;
  white-space: nowrap;
  text-transform: uppercase;
  letter-spacing: 5px;
  user-select: none;
}

/* Marquee Banner Styles - Positioned at bottom */
#marquee-banner {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(90deg, #ff0000, #ff6b6b, #ff0000);
  color: white;
  padding: 10px 0;
  z-index: 9999;
  box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
  overflow: hidden;
}

.marquee-content {
  display: flex;
  animation: marquee 20s linear infinite;
  white-space: nowrap;
}

.marquee-content span {
  padding: 0 50px;
  font-weight: bold;
  font-size: 16px;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

@keyframes marquee {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%);
  }
}

/* For mobile responsiveness */
@media (max-width: 768px) {
  #watermark {
    font-size: 30px;
    letter-spacing: 2px;
  }
  
  .marquee-content span {
    font-size: 14px;
    padding: 0 20px;
  }
  
  #marquee-banner {
    padding: 8px 0;
  }
}
    </style>
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
                    <li><a href="home.php"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="service.php" class="active"><i class="fas fa-cogs"></i> Services</a></li>
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
                
                <!-- Mobile Navigation Toggle -->
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
        <!-- Services Hero Section -->
        <section class="services-hero">
            <h1>Our Services</h1>
            <p>Comprehensive business registration and corporate compliance services tailored for Nigerian enterprises</p>
        </section>

        <!-- Business Registration Services -->
        <section class="service-category">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h2 class="category-title">Business Registration</h2>
                <p class="category-description">
                    Register your business entity with the Corporate Affairs Commission. Choose from various business structures that suit your enterprise needs.
                </p>
            </div>

            <div class="services-grid-detailed">
                <!-- Business Name Registration -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-signature"></i>
                    </div>
                    <h3 class="service-title">Business Name Registration</h3>
                    <p class="service-description">
                        Register your business name for sole proprietorships and partnerships operating under a name other than the owner's true name.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Suitable for small businesses</li>
                        <li><i class="fas fa-check"></i> Fast processing (24-48 hours)</li>
                        <li><i class="fas fa-check"></i> Online certificate delivery</li>
                        <li><i class="fas fa-check"></i> No minimum capital requirement</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦10,000</div>
                        <div class="price-note">Official registration fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="business-name-registration.php" class="btn-service">Register Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Private Limited Company -->
                <div class="service-card-detailed featured">
                    <div class="service-badge">Most Popular</div>
                    <div class="service-icon-large">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3 class="service-title">Private Limited Company (LTD)</h3>
                    <p class="service-description">
                        Incorporate a private company limited by shares with separate legal entity status and limited liability protection.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Limited liability protection</li>
                        <li><i class="fas fa-check"></i> Separate legal entity</li>
                        <li><i class="fas fa-check"></i> Perpetual succession</li>
                        <li><i class="fas fa-check"></i> Minimum of 2 shareholders</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦20,000</div>
                        <div class="price-note">Official registration fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="company-registration.php" class="btn-service">Incorporate Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Public Limited Company -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-city"></i>
                    </div>
                    <h3 class="service-title">Public Limited Company (PLC)</h3>
                    <p class="service-description">
                        Register a public company that can offer shares to the general public and be listed on the stock exchange.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Can offer shares to public</li>
                        <li><i class="fas fa-check"></i> Minimum of 7 shareholders</li>
                        <li><i class="fas fa-check"></i> Higher capital requirements</li>
                        <li><i class="fas fa-check"></i> Regulatory compliance</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦50,000</div>
                        <div class="price-note">Official registration fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="plc-registration.php" class="btn-service">Register Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Incorporated Trustees -->
        <section class="service-category">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h2 class="category-title">Incorporated Trustees</h2>
                <p class="category-description">
                    Register non-profit organizations, NGOs, religious bodies, and community development associations.
                </p>
            </div>

            <div class="services-grid-detailed">
                <!-- NGO Registration -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3 class="service-title">NGO Registration</h3>
                    <p class="service-description">
                        Register non-governmental organizations for charitable, educational, or social development purposes.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Legal entity status</li>
                        <li><i class="fas fa-check"></i> Tax exemption eligibility</li>
                        <li><i class="fas fa-check"></i> Board of trustees structure</li>
                        <li><i class="fas fa-check"></i> Non-profit operations</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦15,000</div>
                        <div class="price-note">Official registration fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="ngo-registration.php" class="btn-service">Register Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Religious Organization -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-place-of-worship"></i>
                    </div>
                    <h3 class="service-title">Religious Organization</h3>
                    <p class="service-description">
                        Register churches, mosques, and other religious organizations as incorporated trustees.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Legal recognition</li>
                        <li><i class="fas fa-check"></i> Property ownership</li>
                        <li><i class="fas fa-check"></i> Trustee management</li>
                        <li><i class="fas fa-check"></i> Constitutional governance</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦15,000</div>
                        <div class="price-note">Official registration fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="religious-organization.php" class="btn-service">Register Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Association Registration -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="service-title">Association Registration</h3>
                    <p class="service-description">
                        Register professional associations, community groups, and social clubs as incorporated trustees.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Formal recognition</li>
                        <li><i class="fas fa-check"></i> Membership management</li>
                        <li><i class="fas fa-check"></i> Constitutional framework</li>
                        <li><i class="fas fa-check"></i> Legal standing</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦15,000</div>
                        <div class="price-note">Official registration fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="association-registration.php" class="btn-service">Register Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compliance Services -->
        <section class="service-category">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h2 class="category-title">Compliance Services</h2>
                <p class="category-description">
                    Stay compliant with CAC regulations through our comprehensive compliance and filing services.
                </p>
            </div>

            <div class="services-grid-detailed">
                <!-- Annual Returns -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <h3 class="service-title">Annual Returns Filing</h3>
                    <p class="service-description">
                        File your company's annual returns to maintain active status and avoid penalties.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Mandatory compliance</li>
                        <li><i class="fas fa-check"></i> Avoid penalties</li>
                        <li><i class="fas fa-check"></i> Maintain active status</li>
                        <li><i class="fas fa-check"></i> Online submission</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦5,000</div>
                        <div class="price-note">Filing fee per year</div>
                    </div>

                    <div class="service-actions">
                        <a href="annual-returns.php" class="btn-service">File Returns</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Change of Directors -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <h3 class="service-title">Change of Directors/Secretary</h3>
                    <p class="service-description">
                        Update your company's directors, shareholders, or company secretary information.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Director appointments</li>
                        <li><i class="fas fa-check"></i> Director resignations</li>
                        <li><i class="fas fa-check"></i> Secretary changes</li>
                        <li><i class="fas fa-check"></i> Statutory updates</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦7,500</div>
                        <div class="price-note">Processing fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="change-directors.php" class="btn-service">Update Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Increase in Share Capital -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="service-title">Increase in Share Capital</h3>
                    <p class="service-description">
                        Officially increase your company's authorized share capital with CAC.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Capital expansion</li>
                        <li><i class="fas fa-check"></i> Investor readiness</li>
                        <li><i class="fas fa-check"></i> Legal documentation</li>
                        <li><i class="fas fa-check"></i> CAC approval</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦10,000</div>
                        <div class="price-note">Processing fee</div>
                    </div>

                    <div class="service-actions">
                        <a href="increase-capital.php" class="btn-service">Apply Now</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Services -->
        <section class="service-category">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h2 class="category-title">Additional Services</h2>
                <p class="category-description">
                    Supplementary services to support your business registration and compliance needs.
                </p>
            </div>

            <div class="services-grid-detailed">
                <!-- Name Availability Search -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="service-title">Name Availability Search</h3>
                    <p class="service-description">
                        Check if your proposed business name is available for registration with CAC.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Instant results</li>
                        <li><i class="fas fa-check"></i> Name reservation</li>
                        <li><i class="fas fa-check"></i> Multiple name checks</li>
                        <li><i class="fas fa-check"></i> Availability report</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦500</div>
                        <div class="price-note">Per name search</div>
                    </div>

                    <div class="service-actions">
                        <a href="name-search.php" class="btn-service">Search Name</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Document Certification -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-stamp"></i>
                    </div>
                    <h3 class="service-title">Document Certification</h3>
                    <p class="service-description">
                        Get certified true copies of your company's registration documents from CAC.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Certified true copies</li>
                        <li><i class="fas fa-check"></i> Legal verification</li>
                        <li><i class="fas fa-check"></i> Bank compliance</li>
                        <li><i class="fas fa-check"></i> Government transactions</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦2,000</div>
                        <div class="price-note">Per document</div>
                    </div>

                    <div class="service-actions">
                        <a href="document-certification.php" class="btn-service">Get Certified</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>

                <!-- Business Status Report -->
                <div class="service-card-detailed">
                    <div class="service-icon-large">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3 class="service-title">Business Status Report</h3>
                    <p class="service-description">
                        Obtain official business status report from CAC for due diligence and verification.
                    </p>
                    
                    <ul class="service-features-detailed">
                        <li><i class="fas fa-check"></i> Official status</li>
                        <li><i class="fas fa-check"></i> Due diligence</li>
                        <li><i class="fas fa-check"></i> Legal verification</li>
                        <li><i class="fas fa-check"></i> Investment purposes</li>
                    </ul>

                    <div class="service-pricing">
                        <div class="price">₦3,000</div>
                        <div class="price-note">Per report</div>
                    </div>

                    <div class="service-actions">
                        <a href="status-report.php" class="btn-service">Get Report</a>
                        <a href="#" class="btn-service-outline">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="service-category">
            <div class="category-header">
                <h2 class="category-title">How Our Services Work</h2>
                <p class="category-description">
                    Simple and straightforward process to get your business registered and compliant
                </p>
            </div>

            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Choose Service</h3>
                    <p class="step-description">Select the business registration or compliance service that meets your needs</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Provide Information</h3>
                    <p class="step-description">Fill out the required forms and upload necessary documents online</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Make Payment</h3>
                    <p class="step-description">Pay the official fees securely through our online payment platform</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Get Approved</h3>
                    <p class="step-description">Receive your certificate and documents once approved by CAC</p>
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
