function validateLogin() {
    // const login_form = document.getElementById("login_form");
    const error_div = document.getElementById("error");
    let login_email = document.getElementById("login_email").value;
    let login_password = document.getElementById("login_password").value;


    let isError = true;


    if (login_email.trim() === "")
        error_div.innerText = "Email is Required";
    else if (login_password.trim().length < 6) {
        error_div.innerText = "Password is too short";
    } else {
        error_div.innerText = "";
        isError = false;
    }

    if (isError) {
        // event.preventDefault();
        return false;
    }

    return true;
}

function validateRegister() {

    // const register_form = document.getElementById("register_form");
    const error_div = document.getElementById("error");

    let register_email = document.getElementById("register_email").value;
    let register_password = document.getElementById("register_password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    let register_name = document.getElementById("register_name").value;

    let phone = document.getElementById("phone").value;
    let ssn = document.getElementById("ssn").value;
    let address = document.getElementById("address").value;


    let isError = true;


    if (register_name.trim() === "") {
        error_div.innerText = "Name is Required";
    } else if (register_email.trim() === "")
        error_div.innerText = "Email is Required";

    else if (register_password.trim().length < 6) {
        error_div.innerText = "Password is too short";
    } else if (register_password !== confirm_password)
        error_div.innerText = "Password Doesn't match";
    else if (ssn.trim() === "")
        error_div.innerText = "SSN is Required";
    else if (address.trim() === "")
        error_div.innerText = "Address is Required";

    else if (phone.trim() === "")
        error_div.innerText = "Phone is Required";


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