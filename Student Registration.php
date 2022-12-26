<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

	require_once 'config.php';

	$query = "select * from category";
	$resultquery = mysqli_query($con, $query) or die(mysqli_error($con));
						
	if(mysqli_num_rows($resultquery) == 0)
	{
		echo "<script>";
		echo "window.alert('You Can\'t Register Yet due to some issue on site');";
		echo "window.alert('We are Trying to resolve it ASAP');";
		echo "window.alert('Redirecting to Home Page');";
		echo "window.location.href = 'index.php';";
		echo "</script>";
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Student Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- side nav css file -->
 <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body>
	<div class="main-content">
		<!-- main content start-->
			<div id="page-wrapper">
				<div class="main-page signup-page">
				<h2 class="title1">Student Registration</h2>
				<div class="sign-up-row widget-shadow">

				<?php
					$FirstN = $MiddleN = $LastN = $Gen = $AadharCard = $Mobile = $Add = $Cour = $failA = $failP = "";
					if(isset($_GET['First']))
					{
						$FirstN = $_GET['First'];
						$MiddleN = $_GET['Middle'];
						$LastN = $_GET['Last'];
						$Gen = $_GET['Gender'];
						$AadharCard = $_GET['Aadhar'];
						$Mobile = $_GET['Mobile'];
						$Add = $_GET['Address'];
						$Cour = $_GET['Course'];
						
						if(isset($_GET['Both']))
						{
							$failA = "<pre>Please Enter A Diffrent AadharCard Number</pre>";
							$failP = "<pre>Please Enter 'jpg', 'png', 'jpeg' format Photograph</pre>";
						}

						if(isset($_GET['failAadhar']))
							$failA = "<pre>Please Enter A Diffrent AadharCard Number</pre>";
						
						if(isset($_GET['failImage']))
							$failP = "<pre>Please Enter 'jpg', 'png', 'jpeg' format Photograph</pre>";
							
					}
				
				?>
				<form action="Student Registration.php" method="POST" enctype = "multipart/form-data">

					<div class="sign-u">
						<input type="text" placeholder="Enter First Name" required name = "FName" value = "<?php echo $FirstN;?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<input type="text" placeholder="Enter Middle Name" required name = "MName" value = "<?php echo $MiddleN;?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<input type="text" placeholder="Enter Last Name" required name = "LName" value = "<?php echo $LastN;?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
					<p style = "border : 1px solid #D0D0D0;">&nbsp;
					<label class = "fa fa-user" style = "font-size : 18px; color : #96969b;"> &nbsp;Select Gender </label>
					<br><br>&nbsp;
					<?php if($Gen == 'Male'){?>
						<input type="radio" required name = "Gender" value = "Male" size style = "height : 20px;width : 20px;" checked> Male
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<input type="radio" required name = "Gender" value = "Female" style = "height : 20px;width : 20px;"> Female
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							<input type="radio" required name = "Gender" value = "Others" style = "height : 20px;width : 20px;"> Others
							<br><br></p>
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="clearfix"></div>
					<?php } else if($Gen == 'Female'){?>
						<input type="radio" required name = "Gender" value = "Male" size style = "height : 20px;width : 20px;"> Male
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<input type="radio" required name = "Gender" value = "Female" style = "height : 20px;width : 20px;" checked> Female
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							<input type="radio" required name = "Gender" value = "Others" style = "height : 20px;width : 20px;"> Others
							<br><br></p>
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="clearfix"></div>
					<?php } else{?>
						<input type="radio" required name = "Gender" value = "Male" size style = "height : 20px;width : 20px;"> Male
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<input type="radio" required name = "Gender" value = "Female" style = "height : 20px;width : 20px;"> Female
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							<input type="radio" required name = "Gender" value = "Others" style = "height : 20px;width : 20px;" checked> Others
							<br><br></p>
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							<div class="clearfix"></div>
					<?php }?>
					</div>

					<div class="sign-u">
						<input type="text" placeholder="Enter Aadhar-Card Number" required name = "Aadhar" maxlength = 12 minlength = 12 value = "<?php echo $AadharCard;?>">
						<?PHP if($failA != ""){?><span><?php echo $failA;?></span>
						<?php }else{?>
						<span class="glyphicon form-control-feedback" aria-hidden="true"><?php echo $failA;?></span>
						<?php }?>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<input type="mobile" placeholder="Enter Mobile Number" required name = "MobileNo" value = "<?php echo $Mobile;?>" maxlength = 10 minlength = 10 style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<textarea placeholder="Enter Your Address" required name = "Address" style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;">	<?php echo $Add;?> </textarea>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<select required name = "Course" style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;">
							<option value = "">	Select Category of Course to Enroll In</option>
							<?php
							
								$show = mysqli_query($con, "Select Category_Name from category");
								
								
								while($row = mysqli_fetch_array($show))
								{
									extract($row);
									if($row['Category_Name'] == $Cour)
									{
							?>
							<option value = "<?php echo $row['Category_Name'];?>" selected><?php echo $row['Category_Name'];?></option>
							
							<?php } else{?>
							<option value = "<?php echo $row['Category_Name'];?>"><?php echo $row['Category_Name'];}}?></option>
						</select>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>
					
					<div class="sign-u">
						<p style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;">
							<label style = "font-size : 18px; color : #96969b;">Upload Your Photo</label>
							<br><br>
							<input type="file" name = "Photo" required>
							<span class="glyphicon form-control-feedback" aria-hidden="true"><?php echo $failP;?></span>
							<div class="clearfix"></div>
						</p>
					</div>

					<div class="sub_home">
							<input type="submit" value="Sign Up" style = "width : 40%" name = "SignUp">
						<div class="clearfix"> </div>
					</div>
					
				</form>
				</div>
			</div>
		</div>

		<?php

			require_once 'config.php';

			if(isset($_POST['SignUp']))
			{
				extract($_POST);

				$FirstName = $_POST['FName'];
				$MiddleName = $_POST['MName'];
				$LastName = $_POST['LName'];
				$Gender = $_POST['Gender'];
				$AadharCardNo = $_POST['Aadhar'];
				$MobileNo = $_POST['MobileNo'];
				$Address = htmlspecialchars($_POST['Address']);
				$Course = $_POST['Course'];
				
				$pname=$_FILES['Photo']['name'];
				$imgExt=strtolower(pathinfo($pname, PATHINFO_EXTENSION));

				$view = "select AadharNo from student";
				$viewresult = mysqli_query($con, $view) or die(mysqli_error($con));

				$message = "Successfully Registered";
				while($row = mysqli_fetch_array($viewresult))
				{
					extract($row);
					if(($row['AadharNo'] == $AadharCardNo) && (!($imgExt == 'jpg' || $imgExt == 'png' || $imgExt == 'jpeg')))
					{
						$message = "Both";
						break;
					}
					else if($row['AadharNo'] == $AadharCardNo)
					{
						$message = "Student with Aadhar No. $AadharCardNo Already Exists";
						break;
					}
					else if(!($imgExt == 'jpg' || $imgExt == 'png' || $imgExt == 'jpeg'))
					{
						$message = "Invalid Photograph Format";
						break;
					}
					else
					{
						$message = "Successfully Registered";
						break;
					}
				}

				if($message == "Both")
				{
					echo "<script>";
					echo "window.alert('Try again with diffrent Aadhar Number and diffrent format of Photograph');";
					echo "window.location.href = 'Student Registration.php?First=$FirstName&Middle=$MiddleName&Last=$LastName&Gender=$Gender&Aadhar=$AadharCardNo&Mobile=$MobileNo&Address=$Address&Course=$Course&Both=$message';";
					echo "</script>";
					exit;
				}
				else if($message == "Student with Aadhar No. $AadharCardNo Already Exists")
				{
					echo "<script>";
					echo "window.alert('$message');";
					echo "window.alert('Try again with diffrent Aadhar Number');";
					echo "window.location.href = 'Student Registration.php?First=$FirstName&Middle=$MiddleName&Last=$LastName&Gender=$Gender&Aadhar=$AadharCardNo&Mobile=$MobileNo&Address=$Address&Course=$Course&failAadhar=$message';";
					echo "</script>";
					exit;
				}
				else if($message == "Invalid Photograph Format")
				{
					echo "<script>";
					echo "window.alert('$message');";
					echo "window.alert('Try again with diffrent format of Photograph');";
					echo "window.location.href = 'Student Registration.php?First=$FirstName&Middle=$MiddleName&Last=$LastName&Gender=$Gender&Aadhar=$AadharCardNo&Mobile=$MobileNo&Address=$Address&Course=$Course&failImage=$message';";
					echo "</script>";
					exit;
				}
				else
				{
					$pname=$_FILES['Photo']['name'];
					$type=$_FILES['Photo']['type'];
					$size=$_FILES['Photo']['size'];
					$temp=$_FILES['Photo']['tmp_name'];
					
					if($pname)
					{
						$upload= "Students/";
						$imgExt=strtolower(pathinfo($pname, PATHINFO_EXTENSION));
						$random = rand(1000,1000000);
						$FileName = $random."Student.".$imgExt;
						$targetFilePath = $upload.$random."Student.".$imgExt;
						$valid_ext= array('jpg','png','jpeg');

						if(in_array($imgExt, $valid_ext))
							move_uploaded_file($temp,$targetFilePath);
					}

					$Password = $FirstName."@".$random;
					$query = "insert into student(AadharNo,First_Name,Middle_Name,Last_Name,Gender,MobileNo,Address,Course,Photo,UserName,Password) values('$AadharCardNo','$FirstName','$MiddleName','$LastName','$Gender','$MobileNo','$Address','$Course','$FileName', '$AadharCardNo', '$Password')";
					$result = mysqli_query($con, $query) or die(mysqli_error($con));

					if($result)
					{
						echo "<script>";
						echo "window.alert('$message');";
						echo "window.alert('Your Username is \'$AadharCardNo\' and Password is \'$Password\' Remember it!!');";
						echo "window.location.href = 'index.php';";
						echo "</script>";
					}
					else
					{
						echo "<script>";
						echo "window.alert('Registration Unsuccessfull');";
						echo "window.location.href = 'index.php';";
						echo "</script>";
					}
				}
			}

		?>

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
	<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>