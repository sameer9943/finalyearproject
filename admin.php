<?php
session_start();
if($_SESSION['login']);
include("processor/login_processor.php");
include("processor/sessionadmin.php");
$showConfirmedSeats = $obj->showConfirmedSeats();
if(isset($_POST['delete'])){
    $resp=$obj->delete_customer();
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
        <link rel="stylesheet" href="./styles/material-dashboard.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
        <style type="text/css">

footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: var(--lightblue-color);
    color: white;
}

footer p {
    letter-spacing: 1px;
    font-weight: 600;
    font-size: 1rem !important;
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
             <li class="list-group-item text-success"><?php echo htmlentities($_SESSION['login']);?></li>
            <li class="me-5 list-group-item"><a href="logout.php" class="text-decoration-none text-primary" >/ Logout</a></li>
    </form>
    </div>
  </div>
</nav>





            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Admin Portal</h4>
                                <p class="card-category"> Total Confirmed Seats</p>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class=" text-primary">
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Contact
                                            </th>
                                            <th>
                                                Seat
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Time
                                            </th>
                                            <th>
                                                Destination
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                            <th>
                                                Actions
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($showConfirmedSeats as $key => $value) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $key+1; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->email;  ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->contact;  ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->seat; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->departure_date;  ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->departure_time;  ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->destination;  ?>
                                                </td>
                                                <td>
                                                    <form method="post" action="admin.php">
                                                        <input type="hidden" name="customer" value="<?php echo $value->customer_id;?>">
                                                        <input type="submit" name="delete" value="Cancel" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the record')">
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="invoice.php?customer_id=<?php echo $value->customer_id; ?>" name="customer_id" class="btn btn-info">Invoice</a>
                                                </td>
                                            </tr>
                                            <?php  } ?>                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer  -->
            <footer>
                <p>Copyright &copy; Last Year Project</p>
            </footer>
        </body>
    </html>