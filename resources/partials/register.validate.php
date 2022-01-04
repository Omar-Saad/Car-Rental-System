<?php
if (isset($_GET['error'])) {

    if ($_GET['error'] == "takenEmail")
        echo "This Email is Already taken";

    if ($_GET['error'] == "takenSSN")
        echo "This SSN is Already taken";

    if ($_GET['error'] == "stmtFailed")
        echo "An Error Has Occurred";
}