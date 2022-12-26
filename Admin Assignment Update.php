<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

    session_start();
    if(!(isset($_SESSION['UserName'])))
    {
        echo "<script>";
        echo "window.alert('Login First to Continue!!');";
        echo "window.alert('Redirecting to Login Page!');";
        echo "window.location.href = 'Admin Login.php';";
        echo "</script>";
    }
?>

<?php

	require_once 'config.php';

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Assignment Update Form</title>
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
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!--//js-->
 
<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<!-- sidebar-starts -->
            <?php
                include 'Admin Sidebar.php';
            ?>
		<!-- //sidebar-ends -->

		<!-- header-starts -->
            <?php
                include 'Admin Header.php';
            ?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms validation">

						

					<div class="row">
						
						<div class="col-md-2">
						</div>

						<div class="col-md-8 validation-grids validation-grids-right">
							<div class="widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title" style = "text-align : center; font-size : 25px;">
									<h4>Assignment Updation Form </h4>
								</div>
								<div class="form-body has-feedback">
									<?php
												
												$AssignmentID = $_GET['AssID'];
												$que = "select * from assignment where Assignment_ID = '$AssignmentID'";
												$result = mysqli_query($con, $que) or die(mysqli_error($con));
												$rows = mysqli_fetch_array($result);
												extract($rows);

												$SubjectPreName = $rows['Subject_Name'];
												$PreDet = $rows['Details'];
												$PreFile = $rows['File'];
												$PreDate = $rows['Submit_Upto'];
									?>
									
									<form data-toggle="validator" method = "POST" name = "Data">
										<div class="form-group">
                                            <select class = "form-control form-select form-select-lg" name = "Sub" required>
												
												<option value = "">	Select Subject</option>
												<?php
                                                    
													$view = "Select Subject_Name from subject";
													$result = mysqli_query($con, $view)  or die(mysqli_error($con));

													while($row = mysqli_fetch_array($result))
													{
                                                        extract($row);
														$Name = $row['Subject_Name'];
														
														if($Name == $SubjectPreName)
														{
											
												?>
												<option value = "<?php echo htmlspecialchars($Name);?>" selected> <?php echo $Name;}else{?> </option>
												<option value = "<?php echo htmlspecialchars($Name);?>"> <?php echo $Name;}}?> </option>

											</select>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
										
										<div class="form-group has-feedback">
											<label> Enter Assignment Details in Brief </label>
											<textarea class = "form-control" name = "Details" required> <?php echo htmlspecialchars($PreDet);?></textarea>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
										<?php 

											$Date = date('Y-m-d',strtotime($PreDate));
											$Time = date('G:i',strtotime($PreDate));

										?>
										<div class="form-group has-feedback">
											<label> Enter DeadLine to Submit Assignment </label>
											<input type="datetime-local" class="form-control" name = "Deadline" value = "<?php echo $Date.'T'.$Time;?>" required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>

										<div class="bottom">
										
											<div class = "col-sm-5 m-b-xs">
												<button type="submit" class="btn btn-primary" name = 'submit'>Submit</button>
											</div>

											<div class = "col-sm-2 m-b-xs">
											</div>

											<div class = "col-sm-5 m-b-xs">
												
												<a href = "Admin Assignment View.php"> 
													
													<button type="button" class="btn btn-primary">back</button>

												</a>

											</div>

											<div class="clearfix"> </div>
										</div>
									</form>

                                    <?php

                                        if(isset($_POST['submit']))
                                        {
                                            extract($_POST);

											$Subject_Name = $_POST['Sub'];
											$Dead = date("Y-m-d G:i:s",strtotime($_POST['Deadline']));
                                            $detail = "select * from subject where Subject_Name = '$Subject_Name'";
                                            $view = mysqli_query($con, $detail) or die(mysqli_error($con));
                                            $row = mysqli_fetch_array($view);
                                            extract($row);
                                            $Abbr = $row['Subject_Abbreviation'];
                                            $Code = $row['Subject_Code'];

                                            $insert = "update assignment set Subject_Name = '$Subject_Name', Subject_Abbreviation = '$Abbr', Subject_Code = '$Code', Subject_Category = '$Subject_Category', Details = '$Details', Submit_Upto = '$Dead' where Assignment_ID = '$AssignmentID'";
                                            $result = mysqli_query($con, $insert)  or die(mysqli_error($con));

                                            if($insert)
                                            {
                                                echo "<script>";
                                                echo "window.alert('Data updated Successfully!!');";
                                                echo "window.location.href = 'Admin Assignment View.php';";
                                                echo "</script>";
                                            }
                                            else
                                            {
                                                echo "<script>";
                                                echo "window.alert('Data Update Failed!!');";
                                                echo "</script>";
                                            }
                                        }
                                    
                                    ?>

								</div>
							</div>
						
							<div class="clearfix"> </div>	
						</div>
					</div>
				</div>
			</div>
			<!--footer-->
			<?php

				include 'Footer.php';
			?>
			<!--//footer-->
		</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->

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
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
	<!--validator js-->
	<script src="js/validator.min.js"></script>
	<!--//validator js-->
	
</body>
</html>