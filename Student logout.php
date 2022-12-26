<?php

    session_start();
    $Admin = $_SESSION['UserName'];
    session_destroy();
    session_start();
    $_SESSION['UserName'] = $Admin;
    echo "<script>";
    echo "window.alert('Logout Successful');";
    echo "window.location.href = 'index.php';";
    echo "</script>";

?>