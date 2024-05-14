<?php
session_name("login");
session_start();

if ( isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true ){
       header("location:customer.php");
}
include("processor/login_processor.php");
$resp = "";
if (isset($_POST['login'])){
    $resp = $obj->login();
    if ($resp == "ok"){
        header("location:customer.php");
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Final Year Project -- Login in</title>
    <link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="./styles/variables.css">
</head>

<body>
    <div id="login-form-wrap">
        <h2>Login</h2>
        <form action="login.php" method="post" id="login-form">
            <p>
                <input type="text" id="name" name="name" placeholder="Full Name" required> 
            </p>
            <p>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </p>
            <p>
                <input type="submit" name="login" id="login" value="Login">
            </p>
             <p style="color:red"><?php echo $resp; ?></p>
        </form>
        <div id="create-account-wrap">
            <p>Hav'nt Booked a Ticket? <a href="index.php#booking">Booked Ticket then Login to See Your Detail</a>
                <p />

        </div>
    </div>
    <div class="back-btn-wrap">
        <a class="back-btn" href="index.php"><i class="fa fa-arrow-left"></i>Back to HomePage</a>
    </div>
    <!-- Footer  -->
    <footer>
        <p>Copyright &copy; Last Year Project</p>
    </footer>
</body>

</html>