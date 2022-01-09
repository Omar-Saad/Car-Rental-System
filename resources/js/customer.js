function validateDate() {
    // const login_form = document.getElementById("login_form");
    const error_div = document.getElementById("error_res");
    let res_date = document.getElementById("res_date").value;
    let ret_date = document.getElementById("ret_date").value;


    let isError = true;

    //console.log(res_date);
    

    if (res_date===""){
       // return false;
        error_div.innerText = "Reserve Date is Required";
    }
    else if (ret_date.trim()=== "") {
        error_div.innerText = "Return Date is Required";
    } 
    else if (!TDate()) {
        return false;
    }
    
    else {
        error_div.innerText = "";
        isError = false;
    }

    
    if (isError) {
        // event.preventDefault();
        return false;
    }

    return true;
}

function TDate() {
    var res_date = document.getElementById("res_date").value;
    var ret_date = document.getElementById("ret_date").value;
    var ToDate = new Date().toISOString().split('T')[0];
    ToDate = new Date(ToDate);
    const d1 = new Date(res_date);
    const d2 = new Date(ret_date);
    const error_div = document.getElementById("error_res");

    console.log(ToDate.getTime());
    console.log(d1.getTime());
    
    if (d1.getTime() < ToDate.getTime()) {
        error_div.innerText = "Date Must Be Greater Than or Equal Today";

          return false;
     }

     else if(d2.getTime() < d1.getTime()){
        error_div.innerText = "Reservation Date Must Be Less Than Return Date";
        return false;
     }
    return true;
}