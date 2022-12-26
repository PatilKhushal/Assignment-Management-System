<?php

    include_once 'config.php';

    $got = $_GET['Category_ID'];

    $view = "select Category_Name from category where Category_ID = '$got'";
    $result = mysqli_query($con, $view) or die(mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $name = $row['Category_Name'];

    $query = "select Photo from student where Course = '$name'";
    $resultquery = mysqli_query($con, $query) or die(mysqli_error($con));
    if($resultquery)
    {
        while($good = mysqli_fetch_array($resultquery))
        {
            extract($good);
            $FileName = $good['Photo'];
            if(file_exists("Students\\$FileName"))
                unlink("Students\\$FileName");
        }

    }

    $query = "delete from student where Course = '$name'";
    $resultquery = mysqli_query($con, $query) or die(mysqli_error($con));

    $que = "select * from assignment where Subject_Category = '$name'";
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
    
    $deleteS = "delete from subject where Subject_Category = '$name'";
    $resultS = mysqli_query($con, $deleteS) or die(mysqli_error($con));

    $deleteA = "delete from assignment where Subject_Category = '$name'";
    $resultA = mysqli_query($con, $deleteA) or die(mysqli_error($con));

    $deleteC = "delete from category where Category_ID = '$got'";
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