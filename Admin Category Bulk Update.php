<?php

    include_once 'config.php';
    
    $got = $_GET['Category_ID'];
    $Cat_Name = $_GET['Category_Name'];
    $Cat_Abbr = $_GET['Category_Abbreviation'];

    $que = "Select * From category where Category_ID = '$got'";
    $result = mysqli_query($con, $que) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $CategoryPreName = $row['Category_Name'];

    $query = "select File,Subject_Name from assignment where Subject_Category = '$CategoryPreName'";
    $resultquery = mysqli_query($con, $query) or die(mysqli_error($query));

    while($row = mysqli_fetch_array($resultquery))
    {
        extract($row);
        $FileName = $row['File'];
        $Name = $row['Subject_Name'];

        $imgExt=strtolower(pathinfo($FileName, PATHINFO_EXTENSION));
        $random = rand(1000,1000000);
        $targetFilePath = $random."-".$Cat_Name."-".$Name.".".$imgExt;

        if(file_exists("Assignment\\$FileName"))
            rename("Assignment\\$FileName", "Assignment\\$targetFilePath");
        
        $updateS = "update assignment set File = '$targetFilePath' where File = '$FileName'";
        $addS = mysqli_query($con, $updateS) or die(mysqli_error($con));
    }

    $update = "update category set Category_Name = '$Cat_Name', Category_Abbreviation = '$Cat_Abbr' where Category_ID = '$got'";
    $add = mysqli_query($con, $update) or die("Can't add data");

    $update = "update student set Course = '$Cat_Name' where Course = '$CategoryPreName'";
    $add = mysqli_query($con, $update) or die("Can't add data");

    $updateS = "update assignment set Subject_Category = '$Cat_Name' where Subject_Category = '$CategoryPreName'";
    $addS = mysqli_query($con, $updateS) or die(mysqli_error($con));

    $updateS = "update subject set Subject_Category = '$Cat_Name' where Subject_Category = '$CategoryPreName'";
    $addS = mysqli_query($con, $updateS) or die(mysqli_error($con));

    if($update)	
    {
        echo "<script>";
        echo "window.alert('Data updated successfully');";
        echo "window.location.href = 'Admin Category View.php';";
        echo "</script>";
    }

    else
    {
        echo "<script>";
        echo "window.alert('Data can't be updated');";
        echo "</script>";
    }

?>