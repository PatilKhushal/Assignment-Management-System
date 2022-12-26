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
<title>Login</title>
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
	
		<?php
			
			$PreFormUserName = $PreFormPassword = $UsernameMessage = $PasswordMessage = "";

			if(isset($_GET['UserName']) && $_GET['Password'])
			{
				$PreFormUserName = $_GET['UserName'];
				$PreFormPassword = $_GET['Password'];
				$UsernameMessage = $_GET['failureUserName'];
				$PasswordMessage = $_GET['failurePassword'];
			}

		?>
		
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">Student Login</h2>
				<div class="sign-up-row widget-shadow">
				<form action="Student Login.php" method="post">
					<div class="sign-u">
						<input type="text" placeholder="Enter User-Name" required name = "user" value = "<?php echo htmlspecialchars($PreFormUserName);?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"><?php echo htmlspecialchars($UsernameMessage);?></span>
						<div class="clearfix"></div>
					</div>
					
					<div class="sign-u">
						<input type="password" placeholder="Password" required name = "password" value = "<?php echo htmlspecialchars($PreFormPassword);?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"><?php echo htmlspecialchars($PasswordMessage);?></span>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sub_home">
							<input type="submit" value="Sign In" style = "width : 40%" name = "SignIn">
						<div class="clearfix"> </div>
					</div>
					
				</form>
				</div>
			</div>
		</div>

		<?php

			if(isset($_POST['SignIn']))
			{
				extract($_POST);
				
				$FormUserName = $_POST['user'];
				$FormPassword = $_POST['password'];

				$query = "select * from student";
				$result = mysqli_query($con, $query) or die($con);

				$message = "Failed";
				while($row = mysqli_fetch_array($result))
				{
					extract($row);
					if($FormUserName == $row['UserName'] && $FormPassword == $row['Password'])
					{
						$message = "Success";
						break;
					}
					else if($FormUserName == $row['UserName'] && $FormPassword != $row['Password'])
					{
						$message = "SuccessUserName";
						break;
					}
				}

				$failUserName = $failPassword = "";

				if($message == "Success")
				{
					session_start();
					
					$_SESSION['StudentUserName'] = $_POST['user'];
					
					echo "<script>";
					echo "window.alert('Login Successful');";
					echo "window.location.href = 'Student main.php';";
					echo "</script>";
				}
				else if($message == "SuccessUserName")
				{	
					$failPassword = "IncorrectPassword";
					echo "<script>";
					echo "window.location.href = 'Student Login.php?UserName=$FormUserName&Password=$FormPassword&failureUserName=$failUserName&failurePassword=$failPassword';";
					echo "</script>";
				}
				else
				{
					$failUserName = "IncorrectUserName";
					$failPassword = "IncorrectPassword";
					echo "<script>";
					echo "window.location.href = 'Student Login.php?UserName=$FormUserName&Password=$FormPassword&failureUserName=$failUserName&failurePassword=$failPassword';";
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