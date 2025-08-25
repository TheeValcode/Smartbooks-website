<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $inquiry_type = $_POST['inquiry_type'];
    $organization = $_POST['organization'];
    $message = $_POST['message'];

    // Email setup
    $to = "smartbooksdigital@gmail.com";
    $subject = "New Contact Form Submission from SmartBooks Website";
    
    // Email body
    $email_body = "You have received a new contact form submission:\n\n";
    $email_body .= "First Name: $first_name\n";
    $email_body .= "Last Name: $last_name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Inquiry Type: $inquiry_type\n";
    $email_body .= "Organization: $organization\n";
    $email_body .= "Message:\n$message\n";

    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email
    $mail_sent = mail($to, $subject, $email_body, $headers);

    // Set response message
    if ($mail_sent) {
        $response = [
            'status' => 'success',
            'message' => 'Thank you for your message! We\'ll get back to you within 24 hours.'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Sorry, there was an error sending your message. Please try again later.'
        ];
    }

    // If it's an AJAX request, return JSON response
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
?>
<!doctype html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="SmartBooks - Nigeria's premier offline digital textbook series for Primary 1 to SS3. Interactive learning with 15-30 subjects, voice tutoring, games, and AI assistance. Works without internet. Perfect for students, parents, teachers, and schools.">
    <title>SmartBooks - Nigeria's Premier Offline Digital Textbook Series | Interactive Learning for Primary & Secondary
        Schools</title>
    <meta name='robots' content='max-image-preview:large' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel='stylesheet' id='apptek-custom-css' href='images/apptek-custom6470.css' media='all' />
    <link rel='stylesheet' id='apptek-menu-css' href='images/header-menu6470.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='apptek-fonts-css'
        href='images/d4641efd01f02f1562de7b5e4ef75fc43118.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='apptek-style-css'
        href='images/05e848a47fea6114259ae04d3a4ff6392fea.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='elementor-frontend-css'
        href='images/3edf7885127234fb86a2414c8c7692693b08.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='elementor-post-7-css'
        href='images/df591dba6acdb386ede380e77e188ef8bca8.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='elementor-post-883-css'
        href='images/28d5c4a8580c58d06f110fa3b1728208b557.css' media='all' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="images/jquery.minf43b.js" id="jquery-core-js"></script>

    <link rel="icon" href="images/smartbooks_favicon.jpg" sizes="32x32" />
    <link rel="icon" href="images/smartbooks_favicon.jpg" sizes="192x192" />
    <link rel="apple-touch-icon" href="images/smartbooks_favicon.jpg" />
    <meta name="msapplication-TileImage" content="images/smartbooks_favicon.jpg" />

    <style>
        /* Override Elementor's default centering */
        .elementor-element-contact-info .elementor-widget-wrap {
            justify-content: flex-start !important;
            align-items: flex-start !important;
            text-align: left !important;
            padding: 0 !important;
        }

        /* Ensure contact cards align to the left */
        .contact-info-cards {
            margin-left: 0 !important;
            padding-left: 0 !important;
            width: 400px;

            text-align: left !important;
        }

        /* Ensure all contact info cards align to the left */
        .contact-info-card {
            text-align: left !important;
            justify-content: flex-start !important;
        }

        /* Target the email and phone links specifically */
        .contact-info-card a {
            display: inline-block;
            text-align: left !important;
            width: 100%;
        }

        /* Ensure the contact details div takes full width */
        .contact-details {
            flex: 1;
            min-width: 0;
            /* Prevents flex items from overflowing */
        }

        /* Remove any default padding from the container */
        .elementor-widget-container {
            padding: 0 !important;
            width: 100% !important;
        }

        /* Responsive Design */
        /* Make form responsive on small screens */
        @media (max-width: 767px) {

            /* Stack form fields on mobile */
            .form-row {
                flex-direction: column !important;
                gap: 20px !important;
            }

            /* Full width inputs on mobile */
            .form-group {
                width: 100% !important;
                margin-bottom: 15px !important;
            }

            /* Adjust form container padding on mobile */
            .contact-form-container {
                padding: 25px 20px !important;
            }

            /* Make textarea full width */
            textarea {
                width: 100% !important;
                min-width: 100% !important;
                max-width: 100% !important;
            }

            /* Adjust button width on mobile */
            .elementor-button {
                width: 100% !important;
            }
        }

        @media (max-width: 480px) {
            .rt-title-heading {
                font-size: 28px !important;
            }

            .contact-form-container {
                padding: 25px 15px !important;
            }

            .submit-btn {
                width: 100% !important;
                min-width: auto !important;
            }
        }

        /* Enhanced Form Styling */
        .smartbooks-contact-form input:focus,
        .smartbooks-contact-form select:focus,
        .smartbooks-contact-form textarea:focus {
            outline: none;
        }

        .smartbooks-contact-form select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
        }

        /* Hover effects for contact info cards */
        .contact-info-card {
            transition: all 0.3s ease;
            justify-items: start !important;
            align-items: start !important;
        }

        .contact-info-cards {
            justify-content: start !important;
        }

        .contact-info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Loading state for form submission */
        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }

        /* Success/Error message styling */
        .form-message {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .form-message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .form-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body
    class="wp-singular page-template page-template-elementor_header_footer page page-id-883 wp-embed-responsive wp-theme-apptek apptek apptek-apptek elementor-default elementor-template-full-width elementor-kit-7 elementor-page elementor-page-883">
    <div class="overlay"></div>
    <div class="rt-cursor-dot-outline-2"></div>
    <div class="rt-cursor-dot-2"></div>
    <div class="scrollup right">
        <svg height="20px" id="Layer_1" version="1.1" viewBox="0 0 512 512" width="20px" xml:space="preserve"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <polygon points="396.6,352 416,331.3 256,160 96,331.3 115.3,352 256,201.5 " />
        </svg>
    </div>
    <div class="apptek-website-layout full-width body-inner">
        <div id="header" class="rt-dark rt-submenu-light">
            <div class="rt-header-inner">
                <div data-elementor-type="section" data-elementor-id="1014" class="elementor elementor-1014">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-ccf09d1 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default"
                        data-id="ccf09d1" data-element_type="section"
                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d8951c8"
                                data-id="d8951c8" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section
                                        class="elementor-section elementor-inner-section elementor-element elementor-element-209e906 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                        data-id="209e906" data-element_type="section">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-a68696b"
                                                data-id="a68696b" data-element_type="column">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-e8b016d elementor-widget elementor-widget-radiant-header_custom_menu"
                                                        data-id="e8b016d" data-element_type="widget"
                                                        data-widget_type="radiant-header_custom_menu.default">
                                                        <div class="elementor-widget-container">
                                                            <header
                                                                class="rt-header logo-left  style2 mobile-header-style1 fixed">
                                                                <div
                                                                    class="rt-header-holder rt-box-holder mobile-logo-column">
                                                                    <div class="logo-holder">
                                                                        <div class="logo"><a
                                                                                href="https://apptek.radiantthemes.com/"><span
                                                                                    class="logo-default"><img
                                                                                        src="images/logo.png" alt="logo"
                                                                                        width="300"
                                                                                        height="auto"></span></a></div>
                                                                    </div>
                                                                    <div class="rt-navbar-menu menu-center">
                                                                        <nav
                                                                            class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
                                                                            <ul id="menu-main-menu" class="mega-menu">
                                                                                <li id="menu-item-43524"
                                                                                    class=" menu-item menu-item-type-post_type menu-item-object-mega_menu menu-item-43524 menu-item-has-children  menu-item-mega-parent">
                                                                                    <a href="index.html"
                                                                                        data-description="">Home</a>
                                                                                </li>
                                                                                <li id="menu-item-43524"
                                                                                    class=" menu-item menu-item-type-post_type menu-item-object-mega_menu menu-item-43524 menu-item-has-children  menu-item-mega-parent">
                                                                                    <a href="features.html"
                                                                                        data-description="">Features</a>
                                                                                </li>
                                                                                <li id="menu-item-36929"
                                                                                    class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-36929 rt-dropdown">
                                                                                    <a href="smartbooks-modes.html"
                                                                                        data-description="">SmartBooks
                                                                                        Modes
                                                                                    </a>
                                                                                </li>
                                                                                <li id="menu-item-36940"
                                                                                    class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-36940">
                                                                                    <a href="pricing.html"
                                                                                        data-description="">Pricing</a>
                                                                                </li>
                                                                            </ul>
                                                                        </nav>
                                                                    </div>
                                                                    <div class="rt-search-cart-holder">
                                                                        <div class="rt-search-cart-inner-holder"></div>
                                                                        <div class="contact_holder">
                                                                            <div class="contact_icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="#FF5F55" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-phone-call">
                                                                                    <path
                                                                                        d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                    </path>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="contact_text">
                                                                                <span>Contact Us</span>
                                                                                <div class="contact_no">
                                                                                    <p>+234-911-5204-198</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="radiantthemes-menu-custom-button visible-lg hidden-xs hidden-md">
                                                                            <a class="radiantthemes-menu-custom-button-main"
                                                                                href="contact.php"
                                                                                rel="nofollow">Contact Us</a>
                                                                        </div>
                                                                        <div
                                                                            class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
                                                                            <div class="rt-mobile-toggle-holder">
                                                                                <div class="rt-mobile-toggle">
                                                                                    <span></span><span></span><span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </header>
                                                            <header
                                                                class="rt-header logo-left  style2 mobile-header-style1">
                                                                <div class="rt-header-holder mobile-logo-column">
                                                                    <div class="logo-holder">
                                                                        <div class="logo"><a
                                                                                href="https://smartbooks.ng/"><span
                                                                                    class="logo-default"><img
                                                                                        src="images/logo.png" alt="logo"
                                                                                        width="126"
                                                                                        height="36"></span></a></div>
                                                                    </div>
                                                                    <div class="rt-navbar-menu menu-center">
                                                                        <nav
                                                                            class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
                                                                            <ul id="menu-main-menu-1" class="mega-menu">
                                                                                <li
                                                                                    class=" menu-item menu-item-type-post_type menu-item-object-mega_menu menu-item-43524 menu-item-has-children  menu-item-mega-parent">
                                                                                    <a href="index.html"
                                                                                        data-description="">Home</a>
                                                                                </li>
                                                                                <li
                                                                                    class=" menu-item menu-item-type-post_type menu-item-object-mega_menu menu-item-43524 menu-item-has-children  menu-item-mega-parent">
                                                                                    <a href="features.html"
                                                                                        data-description="">Features</a>
                                                                                </li>
                                                                                <li
                                                                                    class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-36929 rt-dropdown">
                                                                                    <a href="smartbooks-modes.html"
                                                                                        data-description="">SmartBooks
                                                                                        Modes</a>
                                                                                </li>
                                                                                <li
                                                                                    class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-43071 rt-dropdown">
                                                                                    <a href="pricing.html"
                                                                                        data-description="">Pricing</a>
                                                                                </li>
                                                                            </ul>
                                                                        </nav>
                                                                    </div>
                                                                    <div class="rt-search-cart-holder">
                                                                        <div class="rt-search-cart-inner-holder"></div>
                                                                        <div class="contact_holder">
                                                                            <div class="contact_icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="#FF5F55" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-phone-call">
                                                                                    <path
                                                                                        d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                                                    </path>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="contact_text">
                                                                                <span>Contact Us</span>
                                                                                <div class="contact_no">
                                                                                    <p>+234-911-5204-198</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="radiantthemes-menu-custom-button visible-lg hidden-xs hidden-md">
                                                                            <a class="radiantthemes-menu-custom-button-main"
                                                                                href="contact.php"
                                                                                rel="nofollow">Contact Us</a>
                                                                        </div>
                                                                        <div
                                                                            class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
                                                                            <div class="rt-mobile-toggle-holder">
                                                                                <div class="rt-mobile-toggle">
                                                                                    <span></span><span></span><span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </header>
                                                            <nav id="mobile-menu" class="side-panel">
                                                                <header class="side-panel-header">
                                                                    <span><img data-lazyloaded="1"
                                                                            data-placeholder-resp="126x36"
                                                                            src="images/logo.png" alt="logo" width="300"
                                                                            height="50"></span>
                                                                    <div class="rt-toggle-close rt-close-btn"
                                                                        title="Close"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1" x="0" y="0" width="12"
                                                                            height="12" viewBox="1.1 1.1 12 12"
                                                                            enable-background="new 1.1 1.1 12 12"
                                                                            xml:space="preserve">
                                                                            <path
                                                                                d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z">
                                                                            </path>
                                                                        </svg></div>
                                                                </header>
                                                                <div class="side-panel-inner mobile-side-panel-inner">
                                                                    <div class="mobile-menu-top">
                                                                        <ul id="menu-main-menu-2"
                                                                            class="rt-mobile-menu">
                                                                            <li
                                                                                class=" menu-item menu-item-type-post_type menu-item-object-mega_menu menu-item-43524 menu-item-has-children  menu-item-mega-parent">
                                                                                <a href="index.html"
                                                                                    data-description="">Home</a>
                                                                            </li>
                                                                            <li
                                                                                class=" menu-item menu-item-type-post_type menu-item-object-mega_menu menu-item-43524 menu-item-has-children  menu-item-mega-parent">
                                                                                <a href="features.html"
                                                                                    data-description="">Features</a>
                                                                            </li>
                                                                            <li
                                                                                class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-36929">
                                                                                <a href="smartbooks-modes.html"
                                                                                    data-description="">SmartBooks
                                                                                    Modes</a>
                                                                            </li>
                                                                            <li
                                                                                class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-36940">
                                                                                <a href="pricing.html"
                                                                                    data-description="">Pricing</a>
                                                                            </li>
                                                                            <li
                                                                                class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-36931">
                                                                                <a href="contact.php/"
                                                                                    data-description="">Contact Us</a>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="rt-search-cart-holder"></div>
                                                                    </div>
                                                                </div>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="site">
            <div id="content" class="site-content">
                <div data-elementor-type="wp-page" data-elementor-id="883" class="elementor elementor-883">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="17fad0f" data-element_type="section"
                        style="background: #1c1c3a; padding:10px 15px 90px;">
                    </section>
                    <!-- Contact Section for SmartBooks - Elementor Compatible -->
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-contact-section elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="contact-section" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"
                        style="background-color: #ffffff; padding: 80px 0;">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <!-- Contact Information Column -->
                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-contact-info"
                                    data-id="contact-info" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">

                                        <!-- Section Title -->
                                        <div class="elementor-element elementor-element-contact-title elementor-widget elementor-widget-radiant-custom-heading"
                                            data-id="contact-title" data-element_type="widget"
                                            data-widget_type="radiant-custom-heading.default">
                                            <div class="elementor-widget-container">
                                                <div class="rt-hover-heading">
                                                    <h2 class="rt-title-heading"
                                                        style="color: #333; font-size: 42px; font-weight: 700; margin-bottom: 20px; line-height: 1.2;">
                                                        Let's Transform <span class="rt-highlight-txt"
                                                            style="color: #FF7A50;">Learning</span>
                                                        <span class="highlight-after-text"> Together</span>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Contact Information Cards -->
                                        <div class="contact-info-cards" style="margin-bottom: 40px; padding-left: 0;">

                                            <!-- Office Address -->
                                            <div class="contact-info-card"
                                                style="display: flex; align-items: flex-start; margin-bottom: 25px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #FF7A50;">
                                                <div class="contact-icon" style="margin-right: 15px; margin-top: 5px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="#FF7A50"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                        <circle cx="12" cy="10" r="3"></circle>
                                                    </svg>
                                                </div>
                                                <div class="contact-details">
                                                    <h4
                                                        style="color: #333; font-size: 16px; font-weight: 600; margin: 0 0 5px 0;">
                                                        Office Address</h4>
                                                    <p
                                                        style="color: #666; font-size: 14px; margin: 0; line-height: 1.5;">
                                                        SmartBooks.<br>
                                                        1, Sunny Balogun Junction, Off Agbe, Abule-Egba, Lagos.
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="contact-info-card"
                                                style="display: flex; align-items: flex-start; margin-bottom: 25px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #1CC8D3;">
                                                <div class="contact-icon" style="margin-right: 15px; margin-top: 5px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="#1CC8D3"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                        </path>
                                                        <polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg>
                                                </div>
                                                <div class="contact-details">
                                                    <h4
                                                        style="color: #333; font-size: 16px; font-weight: 600; margin: 0 0 5px 0;">
                                                        Email</h4>
                                                    <p style="color: #666; font-size: 14px; margin: 0;">
                                                        <a href="mailto:info@smartbooks.ng"
                                                            style="color: #1CC8D3; text-decoration: none;">info@smartbooks.ng</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Phone -->
                                            <div class="contact-info-card"
                                                style="display: flex; align-items: flex-start; margin-bottom: 25px; padding: 20px; background: #f8f9fa; border-radius: 12px; border-left: 4px solid #F1A431;">
                                                <div class="contact-icon" style="margin-right: 15px; margin-top: 5px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="#F1A431"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="contact-details">
                                                    <h4
                                                        style="color: #333; font-size: 16px; font-weight: 600; margin: 0 0 5px 0;">
                                                        Phone</h4>
                                                    <p style="color: #666; font-size: 14px; margin: 0;">
                                                        <a href="tel:+2349115204198"
                                                            style="color: #F1A431; text-decoration: none;">+234-911-5204-198</a>
                                                    </p>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                </div>

                                <!-- Contact Form Column -->
                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-contact-form"
                                    data-id="contact-form" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">

                                        <!-- Contact Form -->
                                        <div class="elementor-element elementor-element-form-widget elementor-widget elementor-widget-form"
                                            data-id="form-widget" data-element_type="widget"
                                            data-widget_type="form.default">
                                            <div class="elementor-widget-container">
                                                <div class="contact-form-container"
                                                    style="background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); border: 1px solid #e9ecef;">

                                                    <div class="form-header"
                                                        style="text-align: center; margin-bottom: 30px;">
                                                        <h3
                                                            style="color: #333; font-size: 28px; font-weight: 600; margin-bottom: 10px;">
                                                            Get In Touch</h3>
                                                        <p style="color: #666; font-size: 14px; margin: 0;">Fill out the
                                                            form below and we'll get back to you soon</p>
                                                    </div>

                                                    <form class="smartbooks-contact-form" action="" method="POST" style="width: 100%;">

                                                        <!-- Name Fields Row -->
                                                        <div class="form-row"
                                                            style="display: flex; gap: 15px; margin-bottom: 20px;">
                                                            <div class="form-group" style="flex: 1;">
                                                                <label for="first_name"
                                                                    style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">First
                                                                    Name *</label>
                                                                <input type="text" id="first_name" name="first_name"
                                                                    required
                                                                    style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff;"
                                                                    onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                    onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                                                            </div>
                                                            <div class="form-group" style="flex: 1;">
                                                                <label for="last_name"
                                                                    style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">Last
                                                                    Name *</label>
                                                                <input type="text" id="last_name" name="last_name"
                                                                    required
                                                                    style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff;"
                                                                    onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                    onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                                                            </div>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="form-group" style="margin-bottom: 20px;">
                                                            <label for="email"
                                                                style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">Email
                                                                Address *</label>
                                                            <input type="email" id="email" name="email" required
                                                                style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff;"
                                                                onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                                                        </div>

                                                        <!-- Phone -->
                                                        <div class="form-group" style="margin-bottom: 20px;">
                                                            <label for="phone"
                                                                style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">Phone
                                                                Number</label>
                                                            <input type="tel" id="phone" name="phone"
                                                                style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff;"
                                                                onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                                                        </div>

                                                        <!-- Inquiry Type Dropdown -->
                                                        <div class="form-group" style="margin-bottom: 20px;">
                                                            <label for="inquiry_type"
                                                                style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">How
                                                                Can We Help You? *</label>
                                                            <select id="inquiry_type" name="inquiry_type" required
                                                                style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff; cursor: pointer;"
                                                                onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                                                                <option value="">Select an option...</option>
                                                                <option value="product_demonstrations">Product
                                                                    demonstrations for schools and organizations
                                                                </option>
                                                                <option value="pricing_consultations">Pricing and
                                                                    licensing consultations</option>
                                                                <option value="technical_support">Technical setup and
                                                                    onboarding support</option>
                                                                <option value="partnership_opportunities">Partnership
                                                                    opportunities</option>
                                                            </select>
                                                        </div>

                                                        <!-- Organization/School -->
                                                        <div class="form-group" style="margin-bottom: 20px;">
                                                            <label for="organization"
                                                                style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">Organization/School
                                                                Name</label>
                                                            <input type="text" id="organization" name="organization"
                                                                style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff;"
                                                                onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'">
                                                        </div>

                                                        <!-- Message -->
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                            <label for="message"
                                                                style="display: block; color: #333; font-size: 14px; font-weight: 500; margin-bottom: 8px;">Message
                                                                *</label>
                                                            <textarea id="message" name="message" rows="5" required
                                                                placeholder="Tell us more about your needs and how we can help..."
                                                                style="width: 100%; padding: 12px 16px; border: 2px solid #e9ecef; border-radius: 8px; font-size: 14px; transition: all 0.3s ease; background: #ffffff; resize: vertical; min-height: 120px;"
                                                                onfocus="this.style.borderColor='#FF7A50'; this.style.boxShadow='0 0 0 3px rgba(255,122,80,0.1)'"
                                                                onblur="this.style.borderColor='#e9ecef'; this.style.boxShadow='none'"></textarea>
                                                        </div>

                                                        <!-- Submit Button -->
                                                        <div class="form-group" style="text-align: center;">
                                                            <button type="submit" class="submit-btn"
                                                                style="background: #d81b60; color: white; border: none; padding: 15px 40px; border-radius: 50px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255,122,80,0.3); min-width: 200px;"
                                                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255,122,80,0.4)'"
                                                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255,122,80,0.3)'"
                                                                onmousedown="this.style.transform='translateY(0)'"
                                                                onmouseup="this.style.transform='translateY(-2px)'">
                                                                Send Message
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    style="margin-left: 8px; vertical-align: middle;">
                                                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                                                    <polygon points="22,2 15,22 11,13 2,9"></polygon>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <!-- Privacy Notice -->
                                                        <div class="privacy-notice"
                                                            style="text-align: center; margin-top: 20px;">
                                                            <p
                                                                style="color: #999; font-size: 12px; margin: 0; line-height: 1.4;">
                                                                By submitting this form, you agree to our privacy policy
                                                                and terms of service.
                                                                We'll only use your information to respond to your
                                                                inquiry.
                                                            </p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="Fdata-visualization-software-footer wraper_footer custom-footer">
            <div data-elementor-type="section" data-elementor-id="987" class="elementor elementor-987">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-07d1a58 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="07d1a58" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-541d6c0"
                            data-id="541d6c0" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-283780d elementor-widget__width-initial elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-image"
                                    data-id="283780d" data-element_type="widget"
                                    data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                                    data-widget_type="image.default">
                                    <div class="elementor-widget-container">
                                        <img data-lazyloaded="1" data-placeholder-resp="1748x219"
                                            src="images/vector-line.webp" width="1748" height="219"
                                            class="attachment-full size-full" alt="Curve Line"
                                            data-sizes="(max-width: 1748px) 100vw, 1748px" />
                                    </div>
                                </div>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-4e4553b footer-inner elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="4e4553b" data-element_type="section">
                                    <div class="elementor-background-overlay"></div>
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-c40abf1"
                                            data-id="c40abf1" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-43ae677 elementor-widget elementor-widget-image"
                                                    data-id="43ae677" data-element_type="widget"
                                                    data-widget_type="image.default">
                                                    <div class="elementor-widget-container">
                                                        <img src="images/logo.png"
                                                            style="max-height: 35px; width: auto;" title="logo-white"
                                                            alt="Logo White" />
                                                    </div>
                                                </div>
                                                <!-- <div class="elementor-element elementor-element-4b189fd elementor-widget elementor-widget-text-editor"
                                                    data-id="4b189fd" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        SmartBooks Support</div>
                                                </div> -->
                                                <div class="elementor-element elementor-element-8fc0c14 elementor-widget elementor-widget-text-editor"
                                                    data-id="8fc0c14" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        Your all-in-one offline digital textbook with interactive
                                                        lessons, educational games, voice coaching, and assessments
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0296548 elementor-absolute elementor-view-default elementor-widget elementor-widget-icon"
                                                    data-id="0296548" data-element_type="widget"
                                                    data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                                                    data-widget_type="icon.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-icon-wrapper">
                                                            <div class="elementor-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                    height="10" viewBox="0 0 10 10" fill="none">
                                                                    <circle cx="5" cy="5" r="5" fill="#F1A431"></circle>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-63d3766"
                                            data-id="63d3766" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-5030de8 elementor-widget elementor-widget-heading"
                                                    data-id="5030de8" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-heading-title elementor-size-default">
                                                            Quick Links</div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0f31160 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="0f31160" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="index.html"><span
                                                                        class="elementor-icon-list-text">Home</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0f31160 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="0f31160" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="features.html"><span
                                                                        class="elementor-icon-list-text">Features</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-0234860 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="0234860" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="smartbooks-modes.html"><span
                                                                        class="elementor-icon-list-text">SmartBooks
                                                                        Modes</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- <div class="elementor-element elementor-element-43f3ed4 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="43f3ed4" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="curriculum.html"><span
                                                                        class="elementor-icon-list-text">Curriculum</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                                <div class="elementor-element elementor-element-2026c90 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="2026c90" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="pricing.html"><span
                                                                        class="elementor-icon-list-text">Pricing</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-2026c90 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="2026c90" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="contact.php"><span
                                                                        class="elementor-icon-list-text">Contact
                                                                        Us</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-4e2d73f"
                                            data-id="4e2d73f" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-4a0e888 elementor-widget elementor-widget-heading"
                                                    data-id="4a0e888" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-heading-title elementor-size-default">
                                                            Company</div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-d8e6529 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="d8e6529" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a
                                                                    href="https://apptek.radiantthemes.com/our-service-one/"><span
                                                                        class="elementor-icon-list-text">Services</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-e508486 elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="e508486" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="https://apptek.radiantthemes.com/our-pricing/"><span
                                                                        class="elementor-icon-list-text">Pricing</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-b53117b elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="b53117b" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a
                                                                    href="https://apptek.radiantthemes.com/masonry-creative/"><span
                                                                        class="elementor-icon-list-text">Portfolio</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-810953a elementor-align-left elementor-icon-list--layout-inline elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                    data-id="810953a" data-element_type="widget"
                                                    data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item elementor-inline-item">
                                                                <a href="#"><span
                                                                        class="elementor-icon-list-text">Management</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-53a1c5e"
                                            data-id="53a1c5e" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-9530e77 elementor-widget elementor-widget-heading"
                                                    data-id="9530e77" data-element_type="widget"
                                                    data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-heading-title elementor-size-default">Get
                                                            In Touch</div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-c0115c0 elementor-widget elementor-widget-text-editor"
                                                    data-id="c0115c0" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-element elementor-element-4b189fd elementor-widget elementor-widget-text-editor"
                                                        data-id="4b189fd" data-element_type="widget"
                                                        data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            SmartBooks Support</div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-8fc0c14 elementor-widget elementor-widget-text-editor"
                                                        data-id="8fc0c14" data-element_type="widget"
                                                        data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            info@smartbooks.ng</div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-943bc58 elementor-shape-circle elementor-grid-0 elementor-widget elementor-widget-social-icons"
                                                    data-id="943bc58" data-element_type="widget"
                                                    data-widget_type="social-icons.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-social-icons-wrapper elementor-grid">
                                                            <span class="elementor-grid-item">
                                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-youtube"
                                                                    href="https://www.youtube.com/@SmartbooksDigital"
                                                                    target="_blank" rel="noopener">
                                                                    <span class="elementor-screen-only">YouTube</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-youtube">
                                                                        <path
                                                                            d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z">
                                                                        </path>
                                                                        <polygon
                                                                            points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02">
                                                                        </polygon>
                                                                    </svg>
                                                                </a>
                                                            </span>
                                                            <span class="elementor-grid-item">
                                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram"
                                                                    href="https://www.instagram.com/smartbooksdigital"
                                                                    target="_blank" rel="noopener">
                                                                    <span class="elementor-screen-only">Instagram</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-instagram">
                                                                        <rect x="2" y="2" width="20" height="20" rx="5"
                                                                            ry="5"></rect>
                                                                        <path
                                                                            d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z">
                                                                        </path>
                                                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5">
                                                                        </line>
                                                                    </svg>
                                                                </a>
                                                            </span>
                                                            <span class="elementor-grid-item">
                                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-twitter"
                                                                    href="https://twitter.com/Smartbooks_New"
                                                                    target="_blank" rel="noopener">
                                                                    <span class="elementor-screen-only">Twitter</span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-twitter">
                                                                        <path
                                                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </span>
                                                            <span class="elementor-grid-item">
                                                                <a class="elementor-icon elementor-social-icon elementor-social-icon-tiktok"
                                                                    href="https://www.tiktok.com/@smartbooksdigital"
                                                                    target="_blank" rel="noopener">
                                                                    <span class="elementor-screen-only">TikTok</span>
                                                                    <i class="fab fa-tiktok"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-7a335d2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7a335d2" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-fd51996"
                                            data-id="fd51996" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-b6ef0d5 elementor-widget elementor-widget-text-editor"
                                                    data-id="b6ef0d5" data-element_type="widget"
                                                    data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        &copy; www.smartbooks.ng
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </footer>
    </div>
    <script
        type="speculationrules">{"prefetch":[{"source":"document","where":{"and":[{"href_matches":"\/*"},{"not":{"href_matches":["\/wp-*.php","\/wp-admin\/*","\/wp-content\/uploads\/*","\/wp-content\/*","\/wp-content\/plugins\/*","\/wp-content\/themes\/apptek\/*","\/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}</script>
    <link data-optimized="1" rel='stylesheet' id='elementor-post-1014-css'
        href='images/1661689402971d9191f0651b7a524ee0d2a5.css?ver=6906b' media='all' />
    <link data-optimized="1" rel='stylesheet' id='rt-menu-style-two-css'
        href='images/04fbea04176c0e2ba324b1a6a01d93a95d5f.css?ver=8a358' media='all' />
    <link data-optimized="1" rel='stylesheet' id='elementor-post-35648-css'
        href='images/75a79d65d5e0203628c2e077fdc0323d04a4.css?ver=98815' media='all' />
    <link data-optimized="1" rel='stylesheet' id='elementor-post-35792-css'
        href='images/770929c51bbf2b729181f627e000de98b1c1.css?ver=8379b' media='all' />
    <link data-optimized="1" rel='stylesheet' id='rt-heading-css'
        href='images/0c128b03103945c1bd991762c38b8fbd1a4d.css?ver=1726e' media='all' />
    <link rel='stylesheet' id='rt-button-style-four-css' href='images/button-style-four6470.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='rt-testimonial-css'
        href='images/555c05f1cad23151d2f491fc0cdb30111d88.css?ver=80440' media='all' />
    <link rel='stylesheet' id='rt-accordion-css' href='images/rt-accordion6470.css' media='all' />
    <link data-optimized="1" rel='stylesheet' id='elementor-post-987-css'
        href='images/89054b2327bf534d551ffc497133cd3e6e7d.css?ver=10aba' media='all' />

    <script data-optimized="1" src="images/7a4958d262834fff1ef3c9b1b724f7a6ca99.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.smartbooks-contact-form');
    const submitBtn = form.querySelector('.submit-btn');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Disable submit button and show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Sending... <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px; vertical-align: middle; animation: spin 1s linear infinite;"><circle cx="12" cy="12" r="3"></circle></svg>';

        // Create FormData object
        const formData = new FormData(form);

        // Send form data using fetch
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Reset button
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Send Message <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px; vertical-align: middle;"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22,2 15,22 11,13 2,9"></polygon></svg>';

            // Show message
            showFormMessage(data.message, data.status);

            // Reset form if successful
            if (data.status === 'success') {
                form.reset();
            }
        })
        .catch(error => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Send Message <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px; vertical-align: middle;"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22,2 15,22 11,13 2,9"></polygon></svg>';
            showFormMessage('An error occurred. Please try again later.', 'error');
        });
    });

    // Function to show form messages
    function showFormMessage(message, type) {
        // Remove existing messages
        const existingMessage = form.querySelector('.form-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        // Create new message
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message ${type}`;
        messageDiv.textContent = message;

        // Insert message at the top of the form
        form.insertBefore(messageDiv, form.firstChild);

        // Auto-remove message after 5 seconds
        setTimeout(function () {
            messageDiv.remove();
        }, 5000);
    }
});

        // CSS animation for loading spinner
        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>