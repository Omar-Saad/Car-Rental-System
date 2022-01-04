<?php
if (isset($_GET['error'])) {
    if ($_GET["error"] == "wrongUsernameOrPassword")
        echo "Wrong username or password";
    if ($_GET['error'] == "stmtFailed")
        echo "An Error Has Occurred";
}