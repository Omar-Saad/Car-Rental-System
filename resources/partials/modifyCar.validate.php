<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "carNotExist")
        echo "This Car Doesn't Exist. Please Insert a Valid Plate ID";

    if ($_GET['error'] == "stmtFailed")
        echo "An Error Has Occurred";
}