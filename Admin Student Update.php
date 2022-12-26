<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

	require_once 'config.php';
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

				<form method="POST">

                    <?php
					
						$ID = $_GET['AadharNumber'];
                        $que = "select * from student where AadharNo = '$ID'";
                        $res = mysqli_query($con, $que) or die(mysqli_error($con));

                        $row = mysqli_fetch_array($res);
						extract($row);
						
						$error = '';

						if(isset($_GET['fail']))
							$error = "Student With This Aadhar Already Exists";

						if(isset($_GET['newAadhar']))
							$NA = $_GET['newAadhar'];

                    ?>

					<div class="sign-u">
						<input type="text" placeholder="Enter First Name" required name = "FName" value = "<?php echo $row['First_Name'];?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<input type="text" placeholder="Enter Middle Name" required name = "MName" value = "<?php echo $row['Middle_Name'];?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<input type="text" placeholder="Enter Last Name" required name = "LName" value = "<?php echo $row['Last_Name'];?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

                    <?PHP $Gen = $row['Gender'];?>

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
						<input type="text" placeholder="Enter Aadhar-Card Number" required name = "Aadhar" maxlength = 12 minlength = 12 value = "<?php if($error == '') {echo $row['AadharNo'];} else {echo $NA;}?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"><?php echo $error;?><span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<input type="mobile" placeholder="Enter Mobile Number" required name = "MobileNo" value = "<?php echo $row['MobileNo'];?>" style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<textarea placeholder="Enter Your Address" required name = "Address" style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;"><?php echo $row['Address'];?></textarea>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sign-u">
						<select required name = "Course" style = "outline:none;border: 1px solid #D0D0D0;background: none;font-size: 15px;padding: 14px 15px 14px 37px;width:100%;margin: 0em 0 1.5em 0;">
							<option value = "">	Select Category of Course to Enroll In</option>
							<?php
							
								$show = mysqli_query($con, "Select Category_Name from category");
								
								
								while($rowshow = mysqli_fetch_array($show))
								{
									extract($rowshow);
									if($rowshow['Category_Name'] == $Course)
									{
							?>
							<option value = "<?php $rowshow['Category_Name'];?>" selected><?php echo $rowshow['Category_Name'];?></option>
							
							<?php } else{?>
							<option value = "<?php $rowshow['Category_Name'];?>"><?php echo $rowshow['Category_Name'];}}?></option>
						</select>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="clearfix"></div>
					</div>

					<div class="sub_home">
							<input type="submit" value="Submit" style = "width : 40%" name = "SignUp">
						<div class="clearfix"> </div>
					</div>
					
					<a href = 'Admin Student View.php'>
						<div class="sub_home">
								<input type="button" value="Back" style = "width : 40%">
							<div class="clearfix"> </div>
						</div>
					</a>
				</form>
				</div>
			</div>
		</div>

		<?php
            
            if(isset($_POST['SignUp']))
            {
                $FirstName = $_POST['FName'];
                $MiddleName = $_POST['MName'];
                $LastName = $_POST['LName'];
                $AadharName = $_POST['Aadhar'];

				$que = "select * from student";
				$res = mysqli_query($con, $que) or die(mysqli_error($con));

				$msg = "Success";
				while($row = mysqli_fetch_array($res))
				{
					extract($row);
					if($row['AadharNo'] != $ID && $AadharName == $row['AadharNo'])
					{
						$msg = "Error";
						break;	
					}
				}
				if($msg == "Error")
				{
					echo "<script>";
					echo "window.alert('User with $AadharName Already Exits');";
					echo "window.location.href = 'Admin Student Update.php?AadharNumber=$ID&fail=$msg&newAadhar=$AadharName';";
					echo "</script>";
				}

				else
				{
					$query = "update student set AadharNo = '$AadharName', First_Name = '$FirstName', Middle_Name = '$MiddleName', Last_Name = '$LastName', Gender = '$Gender', MobileNo = '$MobileNo', Address = '$Address', Course = '$Course', UserName = '$AadharName' where AadharNo = '$ID'";
					$result = mysqli_query($con, $query) or die(mysqli_error($con));
					
					if($result)
					{
						echo "<script>";
						echo "window.alert('Data Updated successfully');";
						echo "window.alert('Now Your UserName is $AadharName');";
						echo "window.location.href = 'Admin Student View.php';";
						echo "</script>";
					}
					else
					{
						echo "<script>";
						echo "window.alert('Data Update Failed');";
						echo "window.location.href = 'Admin Subject View.php';";
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