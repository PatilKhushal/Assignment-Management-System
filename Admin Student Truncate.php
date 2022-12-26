<?php
    
    require_once 'config.php';
    
    $ID = $_GET['AadharNumber'];
    $que = "select * from student";
    $result = mysqli_query($con, $que) or die(mysqli_error($con));
    
    while($rows = mysqli_fetch_array($result))
    {
        extract($rows);

        $PreFile = $rows['Photo'];

        if(file_exists("Students\\$PreFile"))
            unlink("Students\\$PreFile");
    )
        
    $view = "truncate table student";
    $result = mysqli_query($con, $view) or die(mysqli_error($con));

    $que = "select * from uploads";
    $result = mysqli_query($con, $que) or die(mysqli_error($con));
        
    while($row = mysqli_fetch_array($result))
    {
        extract($row);

        $PreFile = $row['File'];

        if(file_exists("Uploads\\$PreFile"))
            unlink("Uploads\\$PreFile");   
    }

    $view = "truncate table uploads";
    $res = mysqli_query($con, $view) or die(mysqli_error($con));

    if($res)
    {
        echo "<script>";
        echo "window.alert('Delete Successfull!!!');";
        echo "window.location.href = 'Admin Student View.php';";
        echo "</script>";
    }

    else
    {
        echo "<script>";
        echo "window.alert('Delete Failed!!!');";
        echo "</script>";
    }

?>