<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

    session_start();
    if(!(isset($_SESSION['StudentUserName'])))
    {
        echo "<script>";
        echo "window.alert('Login First to Continue!!');";
        echo "window.alert('Redirecting to Login Page!');";
        echo "window.location.href = 'Student Login.php';";
        echo "</script>";
    }
    else
    {
        $User = $_SESSION['StudentUserName'];
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>

<style>

    h1.title
    {
        text-align : center;
        margin-top : 10px;
        padding-top : 10px;
        padding-bottom : 10px;
        color : darkgrey;
        letter-spacing : 2px;
        word-spacing : 5px;
        border-bottom : solid 1px darkgrey;
    }

    h1.tit
    {
        text-align : center;
        margin-top : 10px;
        padding-top : 10px;
        padding-bottom : 10px;
        color : darkgrey;
        letter-spacing : 2px;
        word-spacing : 5px;
    }

    div.view
    {
        background-color : #eef9f0;
        border-radius : 20px;
    }

    div.r3_counter_box
    {
        background-color : #ddede0;
    }

    div.innerview
    {
        padding : 10px;
    }
    
    label
    {
        color : darkgrey;
    }
</style>

<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->
					<link href="css/owl.carousel.css" rel="stylesheet">
					<script src="js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">

        <!-- sidebar-starts -->
            <?php
                include 'Student Sidebar.php';
            ?>
		<!-- //sidebar-ends -->

		<!-- header-starts -->
            <?php
                include 'Student Header.php';
            ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
            <div class="main-page">

                <?php 

                    
                    
                    $query = "select * from student where UserName = $User";
                    $result = mysqli_query($con,$query) or die(mysqli_error($con));
                    $row = mysqli_fetch_array($result);
                    extract($row);
                    $Category = $row['Course'];
                    
                    $V = "select * from assignment where Subject_Category = '$Category'";
                    $R = mysqli_query($con, $V) or die(mysqli_error($con));

                    $T = mysqli_num_rows($R);
                    if($T == 0)
                    {
                        echo 
                            <<<_END
                            
                                <h1 class = "title">No Assignments have been Alloted Yet!</h1>

                            _END;
                    }

                    else
                    {
                        $query = "select * from subject where Subject_Category = '$Category'";
                        $result = mysqli_query($con,$query) or die(mysqli_error($con));

                        while($row = mysqli_fetch_array($result))
                        {
                            extract($row);
                            $SubjectName = $row['Subject_Name'];
                            $queryA = "select * from assignment where Subject_Name = '$SubjectName'";
                            $resultA = mysqli_query($con,$queryA) or die(mysqli_error($con));
                            $tot = mysqli_num_rows($resultA);
                            if($tot > 0)
                            {
                                echo 
                                <<<_END
                                <div class = "view">
                                
                                    <h1 class = "title">$SubjectName</h1>
                                
                                    <br>
                                    <div class = "innerview">
                                _END;
                                
                                $queryass = "select * from assignment where Subject_Name = '$SubjectName'";
                                $resultass = mysqli_query($con,$queryass) or die(mysqli_error($con));
                                
                                $flag = "";

                                $ques = "select * from uploads where UserName = '$User' AND Subject = '$SubjectName'";
                                $resques = mysqli_query($con, $ques) or die(mysqli_error($con));

                                if(mysqli_num_rows($resultass) == mysqli_num_rows($resques))
                                    {
                                        echo 
                                        <<<_END
                                                <h1 class = "tit">    You have uploaded every assignment for this subject     </h1>
                                                <div class="clearfix"> </div>

                                                </div>
                                                </div><br>
                                        _END;
                                        continue;
                                    } 
                                while($rowass = mysqli_fetch_array($resultass))
                                {
                                    
                                    extract($rowass);
                                    $totalrows = mysqli_fetch_array($resques);
                                    
                                    $Path = $rowass['File'];
                                    $Subj = $rowass['Subject_Name'];

                                    $fileext=strtolower(pathinfo($Path, PATHINFO_EXTENSION));
                                    $JustName=basename("Final Project/Assignment/$Path",'.'.$fileext);

                                    if($totalrows)
                                    {
                                        $TF = $totalrows['File'];
                                        
                                        if($TF == $JustName.".pdf")
                                                continue;
                                    }    
                                    
                                    $Path = $rowass['File'];
                                    $ext = pathinfo($Path,PATHINFO_EXTENSION);
                                    
                                    $q = "select File from uploads where UserName = '$User'";
                                    $r = mysqli_query($con, $q) or die(mysqli_error($con));
                                    if($ext == 'pdf' || $ext == 'doc')
                                    {
                                        echo 
                                        <<<_END
                                                <a href = 'Assignment\\$Path'>
                                                
                                                    <div class="col-md-3 widget widget1">
                                                        <div class="r3_counter_box">
                                                        <img class = "assimage" src = "images\\pdf.png" width = "200px" height = "250px" title = "$Path">
                                                        </div>
                                                    </div>

                                                </a>
                                        _END;
                                    }
                                    else
                                    {
                                        echo 
                                        <<<_END
                                                <a href = 'Assignment\\$Path'>
                                                
                                                    <div class="col-md-3 widget widget1">
                                                        <div class="r3_counter_box">
                                                        <img class = "assimage" src = "Assignment\\$Path" width = "200px" height = "250px" title = "$Path">
                                                        </div>
                                                    </div>

                                                </a>
                                        _END;
                                    }
                                }
                                echo 
                                <<<_END
                                    <div class="clearfix"> </div>

                                    </div>
                                _END;

                                echo 
                                <<<_END
                                    <br>
                                    <div class = "innerview">
                                _END;
                                $queryass = "select * from assignment where Subject_Name = '$SubjectName'";
                                $resultass = mysqli_query($con,$queryass) or die(mysqli_error($con));

                                $ques = "select * from uploads where UserName = '$User' AND Subject = '$SubjectName'";
                                $resques = mysqli_query($con, $ques) or die(mysqli_error($con));

                                while($rowass = mysqli_fetch_array($resultass))
                                {
                                    extract($rowass);
                                    $totalrows = mysqli_fetch_array($resques);
                                    
                                    $Path = $rowass['File'];
                                    $Subj = $rowass['Subject_Name'];

                                    $fileext=strtolower(pathinfo($Path, PATHINFO_EXTENSION));
                                    $JustName=basename("Final Project/Assignment/$Path",'.'.$fileext);

                                    if($totalrows)
                                    {   
                                        if($totalrows['File'] == $JustName.".pdf")
                                                continue;
                                    }    
                                    

                                    
                                    $Path = $rowass['File'];
                                    $Cat = $rowass['Subject_Name'];
                                    $ques = "select * from uploads where UserName = '$User'";
                                    $resques = mysqli_query($con, $ques) or die(mysqli_error($con));

                                        echo 
                                        <<<_END
                                            
                                            <div class="col-md-3 widget widget1" style = 'padding : 10px;'>
                                            <form method = 'POST' action = 'Student main.php' enctype = "multipart/form-data">
                                            <label>Upload Assignment</label>
                                            <br><br>
                                            <input type = 'file' name = 'upload'>
                                            <br><br>
                                            <input type = 'text' name = 'Sub' value = '$Path' hidden>
                                            <br><br>
                                            <input type = 'text' name = 'Subject' value = '$Cat' hidden>
                                            <br><br>
                                            <input type = 'submit' name = 'submit' value = 'Submit' style = 'background-color:darkgrey;width:200px;'>
                                            </form>
                                            </div>

                                        _END;
                                }
                                echo 
                                <<<_END
                                    <div class="clearfix"> </div>

                                    </div>
                                    </div><br>
                                _END;       
                            }
                        }
                    }
                ?> 

            </div>
	    </div>

        <?php
        
            if(isset($_POST['submit']))
            {
                $SubName=$_POST['Sub'];
                $S=$_POST['Subject'];
                $pname=$_FILES['upload']['name'];
                $type=$_FILES['upload']['type'];
                $size=$_FILES['upload']['size'];
                $temp=$_FILES['upload']['tmp_name'];
                $imgExt=strtolower(pathinfo($pname, PATHINFO_EXTENSION));
                
                if($imgExt == 'pdf')
                {
                    if($pname)
                    {
                        $upload= "Uploads/";
                        $fileext=strtolower(pathinfo($SubName, PATHINFO_EXTENSION));
                        $JustName=basename("Final Project/Assignment/$SubName",'.'.$fileext);
                        $imgExt=strtolower(pathinfo($pname, PATHINFO_EXTENSION));
                        $random = rand(1000,1000000);
                        $FileName = $JustName.'.'.$imgExt;
                        $targetFilePath = $upload.$FileName;
                        $valid_ext= array('pdf');
                        if(in_array($imgExt, $valid_ext))
                            move_uploaded_file($temp,$targetFilePath);
                    }
                    
                    $query = "insert into uploads(UserName,File,Subject) values('$User','$FileName','$S')";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));

                    if($result)
                    {
                        echo "<script>";
                        echo "window.alert('Uploaded');";
                        echo "window.location.href = 'Student main.php?Name=$FileName&SN=$S';";
                        echo "</script>";
                    }
                    else
                    {
                        echo "<script>";
                        echo "window.alert('Upload Failed');";
                        echo "</script>";
                    }
                }
                else
                {
                    echo "<script>";
                    echo "window.alert('Please Upload a PDF file!!');";
                    echo "</script>";
                }
            }
        
        ?>
        <!--footer-->
            <?php
                include 'Footer.php';
            ?>
        <!--//footer-->
    </div>
		
	<!-- Classie --><!-- for toggle left push menu script -->
    <script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
    
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
	
</body>
</html>