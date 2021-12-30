const form = document.getElementById("form");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const passwordConfirm = document.getElementById("passwordConfirm");

function RegisterInputs() {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const passwordConfirmValue = passwordConfirm.value.trim();
    let flag = false;

    // email check
    if (emailValue === "") {
        setErrorFor(email, "what's your email?");
        flag = true;
    } else {
        // check for email format
        if (isEmail(emailValue)) {
            setSuccessFor(email);
        } else {
            setErrorFor(email, "invalid email");
        }
    }

    // username check blank
    if (usernameValue === "") {
        setErrorFor(username, "What's your name?");
        flag = true;
    } else {
        setSuccessFor(username);
    }

    if (passwordValue === "" || passwordValue.length <= 8) {
        setErrorFor(password, "please write a combination of at least 8 number");
        flag = true;
    } else {
        setSuccessFor(password);
    }


    if (passwordConfirmValue === "") {
        flag = true;
        setErrorFor(passwordConfirm, "please confirm your password");
    } else {
        if (passwordConfirmValue !== passwordValue) {
            flag = true;
            setErrorFor(passwordConfirm, "password doesn't match");
        } else
            setSuccessFor(passwordConfirm);
    }


    if (flag) {
        return false;
    }
}

function loginInputs() {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    let flag = false;

    if (usernameValue === "") {
        flag = true;
        setErrorFor(username, "What's your name?");
    } else {
        setSuccessFor(username);
    }

    if (passwordValue === "" || passwordValue.length <= 8) {
        flag = true;
        setErrorFor(password, "please wirte a combination of at least 8 number");
    } else {
        setSuccessFor(password);
    }

    if (flag) {
        return false;
    }

}

function isEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


function setSuccessFor(input) {
    const formGroup = input.parentElement;
    formGroup.className = "group success"
}

function setErrorFor(input, message) {
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    formGroup.className = "group error"
    small.innerText = message
}