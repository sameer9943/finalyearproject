const navbar = document.querySelector(".navbar");
const hamburger = document.querySelector(".hamburger");
const navbarwrapper = document.querySelector(".navbar-wrapper");
const datePicker = document.querySelector("#departure_date");
// For date picker to not show past dates
var today = new Date().toISOString().split("T")[0];
datePicker.setAttribute("min", today);

// For scrolling affect
document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("scroll", () => {
        if (this.scrollY > 100) {
            navbar.classList.add("change");
        } else {
            navbar.classList.remove("change");
        }
    });
});

// Hambuger for responsiveness
hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("change-hamburger");
    navbarwrapper.classList.toggle("change-navbar-wrapper");
});
// Taking value of Arrival
let arrival;
document.getElementById("arrival").addEventListener("change", (e) => {
    arrival = e.target.value;
});

// let departure;
// document.getElementById("departure").addEventListener("change", (e) => {
//   departure = e.target.value;
// });

// Form Submition
// document.getElementById("bookingForm").addEventListener("submit", (e) => {
//   if (departure === arrival) {
//     e.preventDefault();
//     alert("Please Select Daparture and Arrival different");
//     return false;
//   }
// });