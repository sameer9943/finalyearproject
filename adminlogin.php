<?php
// session_name("adminlogin");
// session_start();

// if ( isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true ){
//     header("location:admin.php");
// }

include("processor/login_processor.php");
$resp = "";
if (isset($_POST['adminlogin'])){
    $resp = $obj->adminlogin();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Final Year Project -- AdminLogin</title>
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
        <form action="AdminLogin.php" method="post" id="login-form">
            <p>
                <input type="email" name="admin-email" placeholder="Email" required> 
            </p>
            <p>
                <input type="text" name="admin-password" placeholder="Password" required>
            </p>
            <p>
                <input type="submit" name="adminlogin" id="login" value="Login">
            </p>
        </form>
        <div id="create-account-wrap">
            <p>Back to HomePage? <a href="register.php">Register</a></p>
            <p style="color: red;"><?php echo $resp; ?></p>

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