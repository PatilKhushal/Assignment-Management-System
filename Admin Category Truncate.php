<?php

    include_once 'config.php';

    $que = "select * from assignment";
    $resultque = mysqli_query($con, $que) or die(mysqli_error($con));
    if($resultque)
    {
        while($good = mysqli_fetch_array($resultque))
        {
            extract($good);
            $FileName = $good['File'];
            if(file_exists("Assignment\\$FileName"))
                unlink("Assignment\\$FileName");
        }

    }
    
    $deleteS = "truncate table subject";
    $resultS = mysqli_query($con, $deleteS) or die(mysqli_error($con));
    
    $deleteStu = "truncate table student";
    $resultStu = mysqli_query($con, $deleteStu) or die(mysqli_error($con));

    $deleteA = "truncate table assignment";
    $resultA = mysqli_query($con, $deleteA) or die(mysqli_error($con));

    $deleteC = "truncate table category";
    $resultC = mysqli_query($con, $deleteC) or die(mysqli_error($con));

    
    if($deleteC)
    {
        echo "<script>";
        echo "window.alert('Delete Successfull');";
        echo "window.location.href = 'Admin Category View.php';";
        echo "</script>";
    }

    else
    {
        echo "<script>";
        echo "window.alert('Delete Fail');";
        echo "</script>";
    }

?>