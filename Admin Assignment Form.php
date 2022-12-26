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
        echo "window.alert('Redirecting to Admin's Login Page!');";
        echo "window.location.href = 'Admin Login.php';";
        echo "</script>";
    }
?>

<?php

	require_once 'config.php';

	$query = "select * from subject";
	$resultquery = mysqli_query($con, $query) or die(mysqli_error($con));
						
	if(mysqli_num_rows($resultquery) == 0)
	{
		echo "<script>";
		echo "window.alert('You Can\'t Add Assignments Yet');";
		echo "window.alert('Add Subjects First');";
		echo "window.alert('Redirecting to Subjects Addition Form');";
		echo "window.location.href = 'Admin Subject Form.php';";
		echo "</script>";
	}

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Assignment Addition Form</title>
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
									<h4>Assignment Addition Form </h4>
								</div>
								<div class="form-body has-feedback">
									<form data-toggle="validator" method = "POST" action = "Admin Assignment Form.php" enctype = "multipart/form-data">
										<div class="form-group">
                                            <select class = "form-control form-select form-select-lg" name = "Cat" required>
												
												<option value = "">	Select Cateory</option>
												<?php
                                                    
													$view = "Select * from category";
                                                    $result = mysqli_query($con, $view)  or die(mysqli_error($con));
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $Name = $row['Category_Name'];
												?>
												<option value = "<?php echo htmlspecialchars($Name);?>" title = "<?php echo htmlspecialchars($Name);?>" ><?php echo $row['Category_Abbreviation'];}?></option>
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

                                            $C = $_POST['Cat'];

                                            if($C)
                                            {
												echo "<script>";
                                                echo "window.location.href = 'Admin Assignment Form2.php?Category=$C';";
                                                echo "</script>";
                                            }
                                            else
                                            {
                                                echo "<script>";
                                                echo "window.alert('Data insert Failed!!');";
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