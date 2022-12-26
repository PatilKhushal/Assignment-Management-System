<?php
    
    require_once 'config.php';
    
    $ID = $_GET['AssID'];
    $que = "select * from assignment where Assignment_ID = '$ID'";
    $result = mysqli_query($con, $que) or die(mysqli_error($con));
    $rows = mysqli_fetch_array($result);
    extract($rows);

    $PreFile = $rows['File'];

    if(file_exists("Assignment\\$PreFile"))
        unlink("Assignment\\$PreFile");

    $view = "delete from assignment where Assignment_ID = '$ID'";
    $result = mysqli_query($con, $view) or die(mysqli_error($con));

    if($view)
    {
        echo "<script>";
        echo "window.alert('Delete Successfull!!!');";
        echo "window.location.href = 'Admin Assignment View.php';";
        echo "</script>";
    }

    else
    {
        echo "<script>";
        echo "window.alert('Delete Failed!!!');";
        echo "</script>";
    }

?>