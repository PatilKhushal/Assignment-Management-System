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
<title>Assignment View</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/table-style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

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
                                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Assignment View
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs" >
                                <select class="input-sm form-control w-sm inline v-middle" id="bulkoption">
                                    <option value = "">Bulk Action</option>
                                    <option value = "1">Delete All</option>
                                    <option value = "2">Delete Selected</option>
                                </select>
                                <button class="btn btn-sm btn-default" onclick = DoChanges()>Apply</button>                
                            </div>
                            
                            <script type = "text/javascript">

                                function DoChanges()
                                {
                                    var demo = document.getElementById("bulkoption").selectedIndex;
                                    var elements = [];
                                    var x = document.getElementsByName("check");
                                    
                                    for(var i = 0; i < x.length; i++)
                                            if(x[i].checked)
                                                elements.push(x[i].value);

                                    switch (demo) 
                                    {
                                        case 1:
                                                window.location.href = 'Admin Assignment Truncate.php';
                                                break;

                                        case 2:
                                                for(var i = 0; i < elements.length; i++)
                                                {
                                                    alert('Deleting...');
                                                    window.location.href = 'Admin Assignment Delete.php?AssID=' + elements[i];
                                                }
                                                break;
                                    }
                                    
                                }

                            </script>

                            <div class="col-sm-5">
                            </div>

                            <div class="col-sm-2">
                                <div class="input-group">
                                        <span class="input-group-btn">
                                            <a href = "Admin Assignment Form.php" title = "Add Assignment"><button class="btn btn-sm btn-default" type="button" style = "font-weight : bold;">Add Assignment</button></a>
                                        </span>
                                </div>
                            </div>
                        </div>

                            <div class="table-responsive">
                            <table class="table table-striped b-t b-light" id = 'Assignment_Table'>
                            <thead>
                            <tr>
                                <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                                </th>
                                <th style = "color : black;">Assignment ID</th>
                                <th style = "color : black;">Subject Name</th>
                                <th style = "color : black;">Abbreviation</th>
                                <th style = "color : black;">Code</th>
                                <th style = "color : black;">Category</th>
                                <th style = "color : black;">Details</th>
                                <th style = "color : black;">File</th>
                                <th style = "color : black;">DeadLine</th>
                                <th style="width : 15px;"></th>
                                <th style="width : 15px;"></th>
                                <th style="width : 80px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                    $view = "select * from assignment";
                                    $result = mysqli_query($con, $view) or die(mysqli_error($con));

                                    $counter = 0;
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        extract($row);
                                
                                ?>
                                <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox" name="check" value = "<?php echo $Assignment_ID;?>"><i></i></label></td>
                                    <td><?php echo ++$counter;?></td>
                                    <td><?php echo $row['Subject_Name'];?></td>
                                    <td><?php echo $row['Subject_Abbreviation'];?></td>
                                    <td><?php echo $row['Subject_Code'];?></td>
                                    <td><?php echo $row['Subject_Category'];?></td>
                                    <td><?php echo $row['Details'];?></td>
                                    <?php 
                                    
                                        $ext = pathinfo($row['File'], PATHINFO_EXTENSION);
                                        $Photo = $row['File'];

                                        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')
                                        {
                                            echo <<<_END
                                            <td><a href = "Assignment\\$Photo"><img src = "Assignment\\$Photo" width = "200px" height = "250px" title = "$Photo"></a></td>
                                            _END;
                                        }
                                        else
                                        {
                                            echo <<<_END
                                                    <td><a href = "Assignment\\$Photo"><img class = "assimage" src = "images\\pdf.png" width = "200px" height = "250px" title = "$Photo"></a></td>
                                            _END;
                                        }
                                    ?>
                                    <?php $DateTime = $row['Submit_Upto'];?>
                                    <td><?php echo $DateTime;?></td>
                                    <td>
                                    <a href="Admin Assignment Update.php?AssID=<?php echo $row['Assignment_ID']?>" class="active" ui-toggle-class="" title="Update Data"><i class="fa fa-check text-success text-active"></i></a>
                                    </td>
                                    <td>
                                    <a href="Admin Assignment Update2.php?AssID=<?php echo $row['Assignment_ID']?>" class="active" ui-toggle-class="" title="Update File"><i class="fa fa-image text-success text"></i></a>
                                    </td>
                                    <td>
                                    <a href="Admin Assignment Delete.php?AssID=<?php echo $row['Assignment_ID']?>" class="active" ui-toggle-class="" title="Delete Data"><i class="fa fa-times text-danger text"></i></a>
                                    </td>
                                </tr>
                                
                                <?php }?>
                            </tbody>
                            </table>
                        </div>
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