<?php
if (isset($_GET['error'])) {

    if ($_GET['error'] == "carAlreadyExist")
        echo "This Car is Already Exist";

    if ($_GET['error'] == "stmtFailed")
        echo "An Error Has Occurred";

}