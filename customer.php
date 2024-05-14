<?php
include("processor/login_processor.php");
include("processor/sessionCustomer.php");

$mySeats = $obj->mySeats();
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
            <!-- <link rel="stylesheet" href="./styles/admin.css"> -->
            <link rel="stylesheet" href="./styles/material-dashboard.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
         <style type="text/css">
             .back-btn-wrap {
    position: absolute;
    top: 0;
    left: 10px;
    display: inline-block;
    text-align: center;
    padding-top: .5rem;
}

.back-btn-wrap i {
    padding: 0 5px;
    color: var(--lightblue-color);
}

.back-btn {
    text-decoration: none;
    color: var(--lightblue-color);
    border-radius: 5px;
    font-size: 1rem;
}

.back-btn:hover {
    color: var(--lightblue-hover);
}


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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Customer Portal</h4>
                                <p class="card-category"> My Confirmed Seats</p>
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
                                                Action
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($mySeats as $key => $value) { ?>
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
                                                    <?php echo $value->seat;  ?>
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
                                                    <form method="post" action="customer.php">
                                                        <input type="hidden" name="customer" value="<?php echo $value->customer_id;?>">
                                                        <input type="submit" name="delete" value="Cancel" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the record')">
                                                                                                            </form>
                                                </td>
                                                <td>
                                                    <a href="update.php?customer_id=<?php echo $value->customer_id; ?>" class="btn btn-primary update_click" name="customer_id">Update</a>
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

            <div class="back-btn-wrap">
            <a class="back-btn" href="index.php"><i class="fa fa-arrow-left"></i>Back to HomePage</a>
            </div>
            <!-- Footer  -->
            <footer>
                <p>Copyright &copy; Last Year Project</p>
            </footer>
        </body>
    </html>