<?php

    include_once 'config.php';

    $got = $_GET['Subject_ID'];

    $view = "select * from subject where Subject_ID = '$got'";
    $result = mysqli_query($con, $view) or die(mysqli_error($con));

    $row = mysqli_fetch_array($result);
    extract($row);

    $name = $row['Subject_Category'];

    $que = "select * from assignment where Subject_Category = '$name'";
    $resultque = mysqli_query($con, $que) or die(mysqli_error($con));

    while($good = mysqli_fetch_array($resultque))
    {
        extract($good);
        $FileName = $good['File'];
            if(file_exists("Assignment\\$FileName"))
                unlink("Assignment\\$FileName");
    }

    $que = "delete from assignment where Subject_Category = '$name'";
    $resultque = mysqli_query($con, $que) or die(mysqli_error($con));

    $delete = "delete from subject where Subject_ID = '$got'";
    $result = mysqli_query($con, $delete) or die(mysqli_error($con));

    
    if($delete)
    {
        echo "<script>";
        echo "window.alert('Delete Successfull');";
        echo "window.location.href = 'Admin Subject View.php';";
        echo "</script>";
    }

    else
    {
        echo "<script>";
        echo "window.alert('Delete Fail');";
        echo "</script>";
    }

?>