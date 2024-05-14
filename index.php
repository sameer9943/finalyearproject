<?php
session_name("login");
// session_name("adminlogin");
session_start();
session_destroy();

include("processor/login_processor.php");
$availabletime = $obj->get_time();
$availabledestination = $obj->get_destination();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
    <!-- StyleSheets -->
    <link rel="stylesheet" href="./styles/navbar.css" />
    <link rel="stylesheet" href="./styles/index.css" />
    <link rel="stylesheet" href="./styles/variables.css">
    <link rel="stylesheet" href="./styles/guidelines.css" />
    <link rel="stylesheet" href="./styles/routes.css">
    <link rel="stylesheet" href="./styles/whyUs.css" />
    <link rel="stylesheet" href="./styles/detail.css" />
    <link rel="stylesheet" href="./styles/contact.css" />
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/main_booking.css">
    <title>Final Year Project</title>
</head>

<body>
    <!-- Home section -->
    <main class="main">
        <!-- Navbar -->
        <nav class="navbar">
            <h1 class="mbl-logo">Exp<span>ress</span></h1>
            <div class="navbar-wrapper">
                <div class="navbar_left">
                    <h1 class="logo">Exp<span>ress</span></h1>
                </div>
                <div class="navbar_right">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#service">Service</a></li>
                        <li><a href="#booking">Booking</a></li>
                        <li><a href="#contact">Contact us</a></li>
                        <!-- <li><a href="customer.php">Customer</a></li> -->
                        <li><a href="admin.php" hidden>Admin</a></li>
                    </ul>
                    <a class="btn signup-btn" href="customer.php">Customer</a>
                    <a class="btn login-btn" href="adminlogin.php">Admin</a>
                </div>
            </div>
            <i class="hamburger-wrapper">
                <i class="hamburger fa fa-bars"></i>
            </i>
        </nav>
        <div class="main-contents">
            <h1>
                your safe travel journey <br />
                is our main goal
            </h1>
            <p>Reach your destination within exact time</p>
            <a href="#booking" class="btn book-btn">Book Your Seat</a>
        </div>
    </main>
    <!-- Guidline section -->
    <section class="guideline-section">
        <div class="guideline_wrapper">
            <div>
                <h1>
                    Follow 3 steps to <br />
                    Get Your Online Ticket
                </h1>
            </div>
            <div class="guideline-boxes-wrapper">
                <div class="guideline-box guideline-1">
                    <i class="fa fa-street-view"></i>
                    <h4>Select Your Destination</h4>
                    <p>
                        Select Your Destination in one of the three destinations
                    </p>
                </div>
                <div class="guideline-box guideline-2">
                    <i class="fa fa-bus"></i>
                    <h4>Select Your Seat</h4>
                    <p>
                        Select your seat number from 1 to 40
                    </p>
                </div>
                <div class="guideline-box guideline-3">
                    <i class="fa fa-clock"></i>
                    <h4>Select Time</h4>
                    <p>
                        Select time and date of journey
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Routes Section -->
    <!-- <section class="routes-section">
        <div>
            <h1>Routes</h1>
            <div class="routes-wrapper">
                <div class="route-container">
                    <img src="./images/islamabad.jpg" alt="Islamabad">
                    <div>
                        <h3>Peshawar to Islamabad</h3>
                        <h4>Time : 8am</h4>
                        <a href="booking.html" class="btn book-btn-sm">Book now</a>
                    </div>
                </div>
                <div class="route-container">
                    <img src="./images/lahore.jpg" alt="Lahore">
                    <div>
                        <h3>Peshawar to Lahore</h3>
                        <h4>Time : 12pm</h4>
                        <a href="booking.html" class="btn book-btn-sm">Book now</a>
                    </div>
                </div>
                <div class="route-container">
                    <img src="./images/karachi.jpg" alt="Karachi">
                    <div>
                        <h3>Peshawar to Karachi</h3>
                        <h4>Time : 4pm</h4>
                        <a href="booking.html" class="btn book-btn-sm">Book now</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Booking section -->
    <section id="booking" class="booking_section">
        <div class="container">
            <h1>Book a bus ticket</h1>
            <div>
                <form id="bookingForm" action="availableBuses.php">
                    <select name="departure" id="departure">
                        <option value="University Of Swabi">University Of Swabi</option>
                    </select>
                    <select required="required" name="arrival" id="arrival">
                        <option value="">Select Arrival</option>
                        <option>Anbaar</option>
                        <option>Shahmansoor</option>
                        <option>Swabai</option>
                        <option>Shewa Adda</option>
                        <option>Mardan</option>
                    </select>
                    <select id="departure_time" name="departure_time" required="required">
                        <option value="0">Select Time</option>
                        <?php foreach ($availabletime as $key => $value) { ?>
                        <option value="<?php echo $value->departure_time; ?>"><?php echo $value->departure_time; ?></option>
                            
                        <?php } ?>
                    </select>
                    <input required="required" type="date" name="departure_date" id="departure_date">
                    <button class="book-btn" id="book-btn" type="submit">BOOKME</button>
                </form>

            </div>
        </div>
    </section>
    <!-- Why us section -->
    <section class="why-us-section" id="service">
        <div class="why-us-wrapper">
            <div class="col-1">
                <h1>Why you choose us <br> for your journey</h1>
                <p>we offer a really good and trusted transport services</p>
                <div class="row">
                    <div class="icon-wrapper"><i class="fa fa-money-bill"></i></div>
                    <div class="content-wrapper">
                        <h3>Low Charges</h3>
                        <p>we offer the best service with low price </p>
                    </div>
                </div>
                <div class="row">
                    <div class="icon-wrapper"><i class="fa fa-file-invoice-dollar"></i></div>
                    <div class="content-wrapper">
                        <h3>Easy Payment Process</h3>
                        <p>we offer very easy payment process.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="icon-wrapper"><i class="fa fa-shield-check"></i></div>
                    <div class="content-wrapper">
                        <h3>Safe Transport Gurantee</h3>
                        <p>we offer very trusty and safe transport Gurantee</p>
                    </div>
                </div>
                <div class="row">
                    <div class="icon-wrapper"><i class="fa fa-wifi"></i></div>
                    <div class="content-wrapper">
                        <h3>Free Wifi</h3>
                        <p>we offer a high speed internet access</p>
                    </div>
                </div>
                <a href="#booking" class="btn book-btn-sm">Book Your Ticket</a>
            </div>
            <div class="col-2"></div>
        </div>
    </section>
    <!-- Detail Section -->
    <section class="detail-section" id="about">
        <div class="detail-wrapper">
            <h1>some count that matters</h1>
            <p>Our achievement in the journey depicted in numbers</p>
            <div class="detail-boxes-wrapper">
                <div class="detail-box">
                    <h1>100+</h1>
                    <p>Nice Buses</p>
                </div>
                <div class="detail-box">
                    <h1>250+</h1>
                    <p>Journey Completed</p>
                </div>

                <div class="detail-box">
                    <h1>25+</h1>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section class="contact_section" id="contact">
        <div class="row_1">
            <div class="heading">GET IN TOUCH</div>
            <h3 class="heading_2">CONTACT</h3>
        </div>
        <div class="row_2">
            <div class="col_1">
                <div class="item_wrapper">
                    <div>
                        <i class="fa fa-envelope"></i>
                    </div>
                    <p>
                        <a href="mailto:youremail" class="colored">
                            <abbr title=" Click to send a message">Email here</abbr>
                        </a>
                    </p>
                </div>
                <div class="item_wrapper">
                    <div>
                        <i class="fa fa-location"></i>
                    </div>
                    <p>
                        Address here
                    </p>
                </div>
                <div class="item_wrapper">
                    <div>
                        <i class="fa fa-phone"></i>
                    </div>
                    <p>
                        <a href="tel:yourphone" class="colored">
                            <abbr title="Click to call">Phone here</abbr>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col_2">
                <form>
                    <input type="text" name="name" placeholder="Full Name" />
                    <input type="email" name="email" placeholder="Email" />
                    <input type="text" name="subject" placeholder="Subject" />
                    <textarea class="message" name="message" cols="30" rows="10" placeholder="Message"></textarea>
                    <button type="submit" class="btn submitBtn">
                        send message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer  -->
    <footer>
        <p>Copyright &copy; Last Year Project</p>
    </footer>
    <!-- main JS File -->
    <script src="./app.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</body>

</html>