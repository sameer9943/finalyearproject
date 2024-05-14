<?php
include("processor/login_processor.php");
$customer_id = $_GET['customer_id'];
$single_customer=$obj->single_customer_record($customer_id);

$availabletime = $obj->get_time();
$availabledestination = $obj->get_destination();

$resp = "";
 if (isset($_POST['update'])){
    $resp = $obj->update_customer();
    $resp = $obj->update_availablebuses();
    if ($resp == "ok"){
      header("location: customer.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/booking.css">
    <link rel="stylesheet" href="./styles/variables.css">
    <title>Final Year Project --- Booking</title>
</head>

<body>
    <section class="booking-section">
        <div class="booking-form">
            <form id="formSubmit" action="update.php?customer_id=<?php echo $customer_id; ?>" method="post">
                <div class="elem-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" pattern=[A-Z\sa-z]{3,20}
                        required value="<?php echo $single_customer->name; ?>">
                </div>
                <div class="elem-group">
                    <label for="email">Your E-mail</label>
                    <input type="email" id="email" name="email" placeholder="khan@email.com" required value="<?php echo $single_customer->email; ?>">
                </div>
                <div class="elem-group">
                    <label for="phone">Your Phone</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $single_customer->contact; ?>" placeholder="03#########" required>
                </div>
                <div class="elem-group">
                    <label for="destination-selection">Select Destination</label>
                    <select name="destination">
                        <option value="0">Select destination</option>
                  <?php 
                  foreach ($availabledestination as $key => $value) { ?>
                  <option value="<?php echo $value->destination; ?>"><?php echo $value->destination;?></option>
                <?php } ?>
                    </select>
                </div>
                <hr>
                <div class="elem-group">
                    <label for="seat">Seat Number</label>
                    <input type="number" id="" name="seat" max="40" min="1" value="<?php echo $single_customer->seat; ?>">
                </div>

                <div class="elem-group inlined">
                    <label for="">Departure Time</label>
                    <!-- <input type="time" id="" name="" value="<?php echo $single_customer->departure_time; ?>" > -->
                    <select name="departure_time">
                        <?php 
                  foreach ($availabletime as $key => $value) { ?>
                  <option value="<?php echo $value->departure_time; ?>"><?php echo $value->departure_time;?></option>
                <?php } ?>
                    </select>
                </div>
                <div class="elem-group inlined">
                    <label for="departure-date">Departure Date</label>
                    <input type="date" id="" name="departure_date" value="<?php echo $single_customer->departure_date; ?>">
                </div>
                <button id="book-btn" class="confirm" type="submit" name="update" value="insert">Update</button>
            </form>
        </div>
        <div class="booking-desc">
            <h1>update your <br> INFORMATION </h1>
            <p>Make updates to your reservation in a best service</p>
        </div>
    </section>
    <div class="back-btn-wrap">
        <a class="back-btn" href="customer.php"><i class="fa fa-arrow-left"></i>Back to HomePage</a>
    </div>
    <script>
    let seatNo = document.getElementById('seatNo');
    let departure_date = document.getElementById('departure-date')
    let destination_value = document.getElementById('destination_value');
    let departure_time = document.getElementById('departure-time');
   let formSubmit = document.getElementById("formSubmit").addEventListener('submit', () => {
         alert("Seat Successfully reserved")
     })
    let params = new URLSearchParams(window.location.search);
    let GetSeatNo = params.get("seatNo");
    let departureDate = params.get("departure_date");
    let departure = params.get("departure")
    let departureTime = params.get("departure_time");
    let arrival = params.get("arrival")
    seatNo.setAttribute('value', `${GetSeatNo}`)
    departure_date.defaultValue = departureDate;
    departure_time.defaultValue = departureTime;
    destination_value.innerText = `${departure} to ${arrival}`
    destination_value.setAttribute('value', `${departure} to ${arrival}`)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>