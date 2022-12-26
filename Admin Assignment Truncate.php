<?php

    include_once 'config.php';

    $que = "select * from assignment";
    $resultque = mysqli_query($con, $que) or die(mysqli_error($con));

    while($good = mysqli_fetch_array($resultque))
    {
        extract($good);
        $FileName = $good['File'];
            if(file_exists("Assignment\\$FileName"))
                unlink("Assignment\\$FileName");
    }

    $que = "truncate table assignment";
    $resultque = mysqli_query($con, $que) or die(mysqli_error($con));
    
    if($que)
    {
        echo "<script>";
        echo "window.alert('Delete Successfull');";
        echo "window.location.href = 'Admin Assignment View.php';";
        echo "</script>";
    }

    else
    {
        echo "<script>";
        echo "window.alert('Delete Fail');";
        echo "</script>";
    }

?>