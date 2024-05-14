<?php
include("processor/login_processor.php");
$resp="";
// if(isset($_POST['insert'])){
//     $resp=$obj->add_customer();
//     $resp=$obj->availablebuses();
//     if($resp=="ok"){
//         header("location:index.php");
//     }
// }

//error_reporting(0);
?>
<?php 
/*require 'fpdf/fpdf.php';

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', '', '16');
$pdf->Cell(0,10, "Seat Reservation Ticket", 1, 1, "C");
$pdf->SetFont('Arial', '', '12');

$pdf->Cell(40,10, "Departure:", 0, 0);
$pdf->Cell(80,10, $_REQUEST['departure'], 0, 1);

$pdf->Cell(40,10, "Arrival:", 0, 0);
$pdf->Cell(80,10, $_REQUEST['arrival'], 0, 1);

$pdf->Cell(40,10, "Seat No.:", 0, 0);
$pdf->Cell(80,10, $_REQUEST['seatNo'], 0, 1);

$pdf->Cell(40,10, "Departure Time:", 0, 0);
$pdf->Cell(30,10, $_REQUEST['departure_time'], 0, 0);

$pdf->Cell(40,10, "Departure Date:", 0, 0);
$pdf->Cell(40,10, $_REQUEST['departure_date'], 0, 1);

$pdf->Cell(0,10, "Thank you for using our service", 1, 1, "C");

$pdf->output();
*/
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
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    <title>Final Year Project --- Booking</title>
</head>

<body>
    <section class="booking-section">
        <div class="booking-form">
            <form id="bookSeat" >
                <div class="elem-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="visitor_name" placeholder="Full Name" pattern=[A-Z\sa-z]{3,20}
                        required>
                </div>
                <div class="elem-group">
                    <label for="email">Your E-mail</label>
                    <input type="email" id="email" name="visitor_email" placeholder="khan@email.com" required>
                </div>
                <div class="elem-group">
                    <label for="phone">Your Phone</label>
                    <input type="tel" id="phone" name="visitor_phone" placeholder="03#########" required>
                </div>
                <div class="elem-group">
                    <label for="destination-selection">Select Destination</label>
                    <select id="destination-selection" name="destination_preference">
                        <option id="destination_value"></option>
                    </select>
                </div>
                <hr>
                <div class="elem-group">
                    <label for="seat">Seat Number</label>
                    <input readonly type="number" id="seatNo" name="total_seats">
                </div>

                <div class="elem-group inlined">
                    <label for="departure-time">Departure Time</label>
                    <input type="text" id="departure-time" name="departure-time">
                </div>
                <div class="elem-group inlined">
                    <label for="departure-date">Departure Date</label>
                    <input type="date" id="departure-date" name="departure-date" readonly>
                </div>
                <input type="submit" name="insert" id="book-btn" value="Book Seat">
                <!-- <button id="book-btn" class="confirm" type="submit" name="insert" value="insert">Book Seat</button> -->
            </form>
        </div>
        <div class="booking-desc">
            <h1>make your <br> reservation </h1>
            <p>Make your reservation in a best service</p>
        </div>
    </section>
    <div class="back-btn-wrap">
        <a class="back-btn" href="index.php"><i class="fa fa-arrow-left"></i>Back to HomePage</a>
    </div>
    <script>

    let seatNo = document.getElementById('seatNo');
    let departure_date = document.getElementById('departure-date')
    let destination_value = document.getElementById('destination_value');
    let departure_time = document.getElementById('departure-time');
    // let formSubmit = document.getElementById("formSubmit").addEventListener('submit', () => {
    //     alert("Seat Successfully reserved");
    // })
    let params = new URLSearchParams(window.location.search);
    
    let GetSeatNo = params.get("seatNo");
    let departureDate = params.get("departure_date");
    let departure = params.get("departure")
    let departureTime = params.get("departure_time")
    let arrival = params.get("arrival")
    seatNo.setAttribute('value', `${GetSeatNo}`)

    departure_date.defaultValue = departureDate;
    departure_time.defaultValue = departureTime;
    destination_value.innerText = `${departure} to  ${arrival}`
    destination_value.setAttribute('value', `${departure} to ${arrival}`)
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>

