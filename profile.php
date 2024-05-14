<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{
header('location:index.php');
}
else{
if(isset($_POST['submit6']))
	{
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_SESSION['login'];

$sql="UPDATE admin set name=:name, contact=:mobileno where email=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title> bus ticket reservation system</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
            integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="./styles/material-dashboard.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>

  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>

	 <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <!-- <a class="navbar-brand" href="#">Admin</a> -->
    <a href="admin.php" class="navbar-brand"><i class="fa fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change-password.php">Change Password</a>
        </li>
      </ul>
      <form class="d-flex"> 
            <li class="tol list-group-item">Welcome :</li>              
             <li class="list-group-item" style="color: blue;"><?php echo htmlentities($_SESSION['login']);?></li>
            <li class="me-5 list-group-item"><a href="logout.php" class="text-decoration-none" >/ Logout</a></li>
    </form>
    </div>
  </div>
</nav>
<div class="privacy">
	<div class="container">
		<h3 class="wow fadeInDown animated animatedt text-success pb-3" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Update Information</h3>
		<form action="profile.php" name="chngpwd" method="post">
		 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from admin where email=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

	<p style="width: 350px;">
		
			<b>Name</b>  <input type="text" name="name" value="<?php echo htmlentities($result->name);?>" class="form-control" id="name" required="">
	</p> 


<p style="width: 350px;">
<b>Email Id</b>
  <input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->email);?>" id="email" readonly>
      </p>

<p style="width: 350px;">
<b>Mobile Number</b>
<input type="text" class="form-control" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->contact);?>" id="mobileno"  required="">
</p>
<!-- 
<p style="width: 350px;">
<b>Last Updation Date : </b>
<?php echo htmlentities($result->UpdationDate);?>
</p>

<p style="width: 350px;">
<b>Reg Date :</b>
<?php echo htmlentities($result->RegDate);?>
			</p> -->
<?php }} ?>

			<p style="width: 350px;">
<button type="submit" name="submit6" class="btn-primary btn">Update</button>
			</p>
			</form>

		
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
<?php } ?>