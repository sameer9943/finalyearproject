<?php 

 $destination       = $_REQUEST['departure'] .' '. $_REQUEST['arrival'];
 $departure_time    = $_REQUEST['departure_time'];
 $departure_date    = $_REQUEST['departure_date'];

$connection = mysqli_connect('localhost', 'root', '', 'busticketreservationtwo');

$query = mysqli_query($connection, "SELECT seat FROM availablebuses WHERE departure_time = '$departure_time ' AND departure_date = '$departure_date' AND destination = '$destination '");

    if($query){
        $reserved_seats =  array();
        while ( $row = mysqli_fetch_array($query)) {
            $reserved_seats[]=$row['seat'];
        }
    }


  # "pass" php array to JS array:
  echo "<script language='JavaScript'>\n";
  echo "var js_array = new Array();\n";

  $ix = 0;
  foreach($reserved_seats as $key => $value) {
     echo "js_array[$key] = $value;\n";
  }
 echo "</script>\n";
 //exit();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="shortcut icon" href="./images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./styles/availableBuses.css">
    <link rel="stylesheet" href="./styles/variables.css">
    <title>Final Year Project --- Buses Available</title>
</head>

<body>
    <section class="available_seats_section">
        <h1 class="heading destination"></h1>
        <h1>Available Buses</h1>
        <div class="available-bus-wrapper">
            <div>
                <h1 class="destination"></h1>
                <div>
                    Type: <b>Luxury</b><br>
                    Total Seats: <b class="total_seats">36</b>
                    <hr>
                    Date : <b id="bus_date"></b> <br>
                    Time: <b id="bus_time"></b>
                </div>
            </div>
            <div>
                <button class="book-btn" type="submit">Book Seat</button>
            </div>
        </div>
    </section>
    <div class="seats_wrapper">
        <h2>Available seats</h2>
        <div class="genderContainer">
        <div class="male circle"></div>
        <p>Blue is for male</p>
    </div>
    <div class="genderContainer mb">
        <div class="female circle "></div>
        <p>Purple is for female</p>
    </div>
        <div class="seatsplan">
            <!-- Added from JavaScript -->
        </div>
        <button id="cancel-btn"><i class="fas fa-times"></i></button>
        <button class="seatPlanBtn" type="submit">Book Ticket</button>
    </div>
    <div class="back-btn-wrap">
        <a class="back-btn" href="index.php"><i class="fa fa-arrow-left"></i>Back to HomePage</a>
    </div>
    <script>
    const destination = document.querySelectorAll('.destination');
    const total_seats = document.querySelector('.total_seats').textContent;
    const seats_model = document.querySelector('.seats_wrapper'); 
    const available_seats_section = document.querySelector(".available_seats_section");
    const seats_plan = document.querySelector('.seatsplan');
    const bookBtn = document.querySelector('.book-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const seatPlanBtn = document.querySelector('.seatPlanBtn').addEventListener("click", () => {
        window.location.replace(`booking.php?seatNo=${selectedSeat}&departure=${departure}&arrival=${arrival}&departure_date=${departure_date}&departure_time=${departure_time}`);
    });
    bookBtn.addEventListener("click", () => {
        const params = new URLSearchParams(window.location.search);
        params.set("total_seats", total_seats);
        window.history.replaceState({}, "", decodeURIComponent(`${window.location.pathname}?${params}`));
        const seats = params.get('total_seats');
        seats_model.classList.add('show');
        available_seats_section.classList.add("blur");
        
        
        for (let i = 1; i <= seats; i++) {
            var style ='style="background-color:green; color:#fff;"';
            if(i==1 || i==2 || i==3 || i==4 || i==5 || i==6 || i==7 || i==8 || i==9 || i==10 || i==11 || i==12 || i==13 || i==14 || i==15 || i==16 || i==17 || i==18 ){
                style ='style="background-color:darkpink; color:#fff;"';
            }

            for(let ind = 0; ind < js_array.length; ind++){

                if(i == js_array[ind]){
                    style = 'style="background-color:grey; color:#fff; pointer-events:none; cursor:not-allowed"';
                }
            }                            

            seats_plan.innerHTML += `<div `+style+` id=${i} onClick="Clicked(${i})">${i}</div>`;
           
        }
    })
    cancelBtn.addEventListener('click', () => {
        seats_model.classList.remove('show');
        available_seats_section.classList.remove("blur");
        seats_plan.innerHTML = " "
    });

    // Selecting seat
    let selectedSeat;
    function Clicked(i) {
        selectedSeat = i;
        document.getElementById(`${i}`).style.backgroundColor = 'gray'
    }
    // Taking query from URL
    const queryString = window.location.search;
    const parameters = new URLSearchParams(queryString);
    const departure = parameters.get('departure');
    const arrival = parameters.get('arrival');
    const departure_date = parameters.get("departure_date");
    const departure_time = parameters.get("departure_time");
    for (var i = 0; i < destination.length; i++) {
        destination[i].innerHTML = `${departure.charAt(0).toUpperCase() + departure.slice(1)} to ${arrival.charAt(0).toUpperCase() + arrival.slice(1)}`;
    }

    // Setting Date
    let bus_date = document.getElementById('bus_date')
    bus_date.innerText = departure_date;
    // Setting time for each bus
    let bus_time = document.getElementById("bus_time");
    bus_time.innerText = departure_time;
    // let departure_time;
    // if (arrival === "Sadar Bazar") {
    //     bus_time.innerText = '2:00pm'
    //     departure_time = "14:00";
    // } else if (arrival === "Karhano Market") {
    //     bus_time.innerText = '3:00pm'
    //     departure_time = "15:00";
    // } else if (arrival === "Hayatabad") {
    //     bus_time.innerText = '12:00pm'
    //     departure_time = "12:00";
    // } else if (arrival === "Arbab road") {
    //     bus_time.innerText = '3:45pm'
    //     departure_time = "15:45";

    // } else if (arrival === "Haji Camp") {
    //     bus_time.innerText = '1:15pm'
    //     departure_time = "13:15";
    // }
    </script>
</body>

</html>