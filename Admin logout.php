<?php

    session_start();
    $User = $_SESSION['StudentUserName'];
    session_destroy();
    session_start();
    $_SESSION['StudentUserName'] = $User;
    echo "<script>";
    echo "window.alert('Logout Successful');";
    echo "window.location.href = 'index.php';";
    echo "</script>";

?>