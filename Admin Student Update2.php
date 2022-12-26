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

				<form method="POST" enctype = 'multipart/form-data'>

                    <?php
					
						$ID = $_GET['AadharNumber'];
                        $que = "select * from student where AadharNo = '$ID'";
                        $res = mysqli_query($con, $que) or die(mysqli_error($con));

                        $row = mysqli_fetch_array($res);
						extract($row);
						
						$PreFile = $row['Photo'];

						$failP = "";

						if(isset($_GET['fail']))
							$failP = "<pre>Please Enter 'jpg', 'png', 'jpeg' format Photograph</pre>";

						

                    ?>

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
				extract($_POST);

				$pname=$_FILES['Photo']['name'];
				$imgExt=strtolower(pathinfo($pname, PATHINFO_EXTENSION));

				if($imgExt == 'jpg' || $imgExt == 'png' || $imgExt == 'jpeg')
				{
					$type=$_FILES['Photo']['type'];
					$size=$_FILES['Photo']['size'];
					$temp=$_FILES['Photo']['tmp_name'];

					$upload= "Students/";
					$random = rand(1000,1000000);
					$FileName = $random."Student.".$imgExt;
					$targetFilePath = $upload.$random."Student.".$imgExt;
					$valid_ext= array('jpg','png','jpeg');

					if(in_array($imgExt, $valid_ext))
							move_uploaded_file($temp,$targetFilePath);

					if(file_exists("Students\\$PreFile"))
						unlink("Students\\$PreFile");

					$que = "update student set Photo = '$FileName' where AadharNo = '$ID'";
					$result = mysqli_query($con, $que) or die(mysqli_error($con));

					if($result)
					{
						echo "<script>";
						echo "window.alert('Photo Updated Successfully');";
						echo "window.location.href = 'Admin Student View.php';";
						echo "</script>";
					}
					else
					{
						echo "<script>";
						echo "window.alert('Photo Update Failed');";
						echo "window.location.href = 'Admin Student View.php';";
						echo "</script>";
					}
				}

				else
				{
					echo "<script>";
					echo "window.alert('Please Upload a Diffrent Format of Photo');";
					echo "window.location.href = 'Admin Student Update2.php?AadharNumber=$ID&fail=$message';";
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