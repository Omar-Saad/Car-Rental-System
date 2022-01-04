

function validateCar() {

    // const register_form = document.getElementById("register_form");
    const error_div = document.getElementById("error");

    let plate_id = document.getElementById("plate_id").value;
    let body_style = document.getElementById("body_style").value;
    let year = document.getElementById("year").value;
    //let status = document.getElementById("status").value;

    let price = document.getElementById("price").value;
    let car_image = document.getElementById("car_image").value;
    let location = document.getElementById("location").value;


    let isError = true;


    if (plate_id.trim() === "") {
        error_div.innerText = "Plate Id is Required";
    } else if (body_style.trim() === "")
        error_div.innerText = "body_style is Required";

    else if (year.trim().length != 4) {
        error_div.innerText = "Year is too short";
    } else if (price.trim() === "")
        error_div.innerText = "Price is Required";
    else if (location.trim() === "")
        error_div.innerText = "Location is Required";
    else if (car_image.trim() === "")
        error_div.innerText = "Car Image is Required";

    else {
        error_div.innerText = "";
        isError = false;
    }

    if (isError) {
        //    event.preventDefault();
        return false;
    }

    return true;


}



function validateSpecs() {

    // const register_form = document.getElementById("register_form");
    const error_div = document.getElementById("error");

    let transmission = document.getElementById("transmission").value;
    let body_style = document.getElementById("body_style").value;
    let engine_capacity = document.getElementById("engine_capacity").value;

    let fuel_consumption = document.getElementById("fuel_consumption").value;

    let air_bag_count = document.getElementById("air_bag_count").value;
    let seat_count = document.getElementById("seat_count").value;




    let isError = true;


    if (transmission.trim() === "") {
        error_div.innerText = "transmission is Required";
    } else if (body_style.trim() === "")
        error_div.innerText = "body style is Required";
    else if (seat_count.trim() === "" || seat_count < 0)
        error_div.innerText = "seat count is Required";

    else if (engine_capacity.trim() === "" || engine_capacity < 0) {
        error_div.innerText = "engine capacity is too short";
    } else if (fuel_consumption.trim() === "" || fuel_consumption < 0){
        error_div.innerText = "fuel consumption is Required";}

    else if (air_bag_count.trim() === "" || air_bag_count < 0){
        
        error_div.innerText = "air bag count is Required";
    }


    else {
        error_div.innerText = "";
        isError = false;
    }

    if (isError) {
        //    event.preventDefault();
        return false;
    }

    return true;


}