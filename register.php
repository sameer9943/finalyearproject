 <?php
include("processor/login_processor.php");
$resp = "";
if(isset($_POST['signup'])){
    $resp=$obj->register();
    header("location:Adminlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Final Year Project -- Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/variables.css">
    <link rel="stylesheet" href="./styles/register.css">
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="register.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="fname" placeholder="Enter your Fname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="lname" placeholder="Enter your Lname" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="text" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="text" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="signup" value="Register">
                    <p><?php echo $resp; ?></p>
                </div>
            </form>
        </div>
    </div>
    <div class="back-btn-wrap">
        <a class="back-btn" href="index.php"><i class="fa fa-arrow-left"></i>Back to HomePage</a>
    </div>
    <footer>
        <p>Copyright &copy; Last Year Project</p>
    </footer>
</body>

</html>