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
<title>Subject Updation Form</title>
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
									<h4>Subject Updation Form </h4>
								</div>
								<div class="form-body">
                                    <?php 
                                    
										$got = $_GET['Subject_ID'];
										$CategoryPreName = $_GET['Category_Name'];
                                        $que = "Select * from subject where Subject_ID = '$got'";
                                        $result = mysqli_query($con, $que) or die(mysqli_error($con));

										$row = mysqli_fetch_array($result);
										$SubjectPreName = $row['Subject_Name'];
                                    ?>
									<form data-toggle="validator" method = "POST">
										<div class="form-group has-feedback">
											<input type="text" class="form-control" name = "Sub_Name" placeholder="Enter Subject Name" value = "<?php echo htmlspecialchars($SubjectPreName);?>" required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>

										<div class="form-group has-feedback">
											<input type="text" class="form-control" name = "Sub_Abbr" maxlength = 4 placeholder="Enter Subject Abbreviation" value = "<?php echo $row['Subject_Abbreviation'];?>" required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>

										<div class="form-group has-feedback">
											<input type="text" class="form-control" name = "Sub_Code" maxlength = 6 placeholder="Enter Subject Code" value = "<?php echo $row['Subject_Code'];?>" required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>

										<?php
										
											$show = mysqli_query($con, "Select * from category");

											$CategoryAbbr = "";

											while($rowsTwo = mysqli_fetch_array($show))
											{	
												
												extract($rowsTwo);

												if($rowsTwo['Category_Name'] == $CategoryPreName)
												{
													$CategoryAbbr = $rowsTwo['Category_Abbreviation'];
													break;
												}
											}

										?>

										<div class="form-group">
											<select class = "form-control form-select form-select-lg" name = "Sub_Cat" required>
												<option value = "">	Select Category for Subject</option>
												<?php
												
													$show = mysqli_query($con, "Select * from category");
													
													while($row = mysqli_fetch_array($show))
													{
														extract($row);
														$CategoryName = $row['Category_Name'];
														if($row['Category_Abbreviation'] == $CategoryAbbr)
														{
												?>
												<option value = "<?php echo htmlspecialchars($CategoryName);?>" title = "<?php echo htmlspecialchars($CategoryName);?>" selected> <?php echo $row['Category_Abbreviation'];}else{?></option>
												<option value = "<?php echo htmlspecialchars($CategoryName);?>" title = "<?php echo htmlspecialchars($CategoryName);?>"> <?php echo $row['Category_Abbreviation'];}}?></option>
												
											</select>
											
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
										
										<div class="bottom">
										
											<div class = "col-sm-5 m-b-xs">
												<button type="submit" class="btn btn-primary" name = 'submit'>Submit</button>
											</div>

											<div class = "col-sm-2 m-b-xs">
											</div>

											<div class = "col-sm-5 m-b-xs">
												
												<a href = "Admin Subject View.php"> 
													
													<button type="button" class="btn btn-primary">Back</button>

												</a>

											</div>

											<div class="clearfix"> </div>

										</div>
									</form>
								</div>
							</div>
						
							<div class="clearfix"> </div>	
						</div>

					</div>
					
					<?php
					
						if(isset($_POST['submit']))
						{
							extract($_POST);

							$q = "select Subject_Name from subject where Subject_ID = '$got'";
							$r = mysqli_query($con, $q) or die(mysqli_error($con));

							$row = mysqli_fetch_array($r);
							$SubjectPrePostName = $row['Subject_Name'];

							$insert = "update subject set Subject_Name = '$Sub_Name', Subject_Abbreviation = '$Sub_Abbr', Subject_Code = '$Sub_Code', Subject_Category = '$Sub_Cat' where Subject_ID = '$got'";
							$add = mysqli_query($con, $insert);

							$query = "select File,Subject_Category from assignment where Subject_Name = '$SubjectPrePostName'";
							$resultquery = mysqli_query($con, $query) or die(mysqli_error($query));

							while($row = mysqli_fetch_array($resultquery))
							{
								extract($row);
								$FileName = $row['File'];
								$CateName = $row['Subject_Category'];

								$imgExt=strtolower(pathinfo($FileName, PATHINFO_EXTENSION));
								$random = rand(1000,1000000);
								$targetFilePath = $random."-".$CateName."-".$Sub_Name.".".$imgExt;

								if(file_exists("Assignment\\$FileName"))
									rename("Assignment\\$FileName", "Assignment\\$targetFilePath");
								
								$updateS = "update assignment set File = '$targetFilePath' where File = '$FileName'";
								$addS = mysqli_query($con, $updateS) or die(mysqli_error($con));
							}

							$insertA = "update assignment set Subject_Name = '$Sub_Name', Subject_Abbreviation = '$Sub_Abbr', Subject_Code = '$Sub_Code', Subject_Category = '$Sub_Cat', File = '$targetFilePath' where Subject_Name = '$SubjectPreName'";
							$addA = mysqli_query($con, $insertA);

							if($insert)
							{
								echo "<script>";
								echo "window.alert('Data Updated successfully');";
								echo "window.location.href = 'Admin Subject View.php';";
								echo "</script>";
							}

							else
							{
								echo "<script>";
								echo "window.alert('Data can't be Updated');";
								echo "</script>";
							}
						}

					?>
					
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

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
	
	<!--validator js-->
	<script src="js/validator.min.js"></script>
	<!--//validator js-->
	
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
	
</body>
</html>