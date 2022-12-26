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


<!DOCTYPE HTML>
<html>
<head>
<title>Category View</title>
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
            <?php

                require_once 'config.php';

                $que = "Select * from category";
                $result = mysqli_query($con, $que) or die("Error, can't follow the instructions" . mysqli_error($con));

                $counter = 0;
            ?>
            
			<div class="main-page">
                                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Category View
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs" >
                                <select class="input-sm form-control w-sm inline v-middle" id="bulkoption">
                                    <option value = "">Bulk Action</option>
                                    <option value = "1">Delete All</option>
                                    <option value = "2">Delete Selected</option>
                                    <option value = "3">Update All</option>
                                    <option value = "4">Update Selected</option>
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
                                                window.location.href = 'Admin Category Truncate.php';
                                                break;

                                        case 2:
                                                for(var i = 0; i < elements.length; i++)
                                                {
                                                    alert('Deleting...');
                                                    window.location.href = 'Admin Category Delete.php?Category_ID=' + elements[i];
                                                }
                                                break;

                                        case 3:
                                                var Category_Table = document.getElementById('Category_Table');
                                                for(var i = 0; i < x.length; i++)
                                                    elements.push(x[i].value);

                                                alert(elements.length);

                                                var element = "";
                                                var elementName = "";
                                                var elementAbbr = "";

                                                for(var j = 0; j < elements.length; j++)
                                                {
                                                    alert(j+1);
                                                    element = Category_Table.rows.item(j + 1).cells;
                                                    elementName = element[2].innerText;
                                                    elementAbbr = element[3].innerText;

                                                    CatNewName = prompt("Enter New Category Name for Category = '" + elementName + "'", elementName);
                                                    CatNewAbbr = prompt("Enter New Category Abbreviation for Category = '" + elementName + "' and Abbreviation = '" + elementAbbr + "'", elementAbbr);

                                                    window.location.href = 'Admin Category Bulk Update.php?Category_ID=' + elements[j] + "&Category_Name=" + CatNewName + "&Category_Abbreviation=" + CatNewAbbr;
                                                } 
                                                break;

                                        case 4:
                                                if(elements.length == 1)
                                                    window.location.href = 'Admin Category Update.php?Category_ID=' + elements[0];

                                                else
                                                {
                                                    var Category_Table = document.getElementById('Category_Table');

                                                    for(var i = 0; i < elements.length; i++)
                                                    {
                                                        var element = "";
                                                        var elementName = "";
                                                        var elementAbbr = "";

                                                        for(var j = 0; j < x.length; j++)
                                                        {
                                                            if(x[j].value == elements[i])
                                                            {
                                                                element = Category_Table.rows.item(j + 1).cells;
                                                                elementName = element[2].innerText;
                                                                elementAbbr = element[3].innerText;

                                                                CatNewName = prompt("Enter New Category Name for Category = '" + elementName + "'", elementName);
                                                                CatNewAbbr = prompt("Enter New Category Abbreviation for Category = '" + elementName + "' and Abbreviation = '" + elementAbbr + "'", elementAbbr);

                                                                window.location.href = 'Admin Category Bulk Update.php?Category_ID=' + elements[i] + "&Category_Name=" + CatNewName + "&Category_Abbreviation=" + CatNewAbbr;
                                                            }
                                                        }
                                                        
                                                    }
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
                                            <a href = "Admin Categories Form.php" title = "Add Category"><button class="btn btn-sm btn-default" type="button" style = "font-weight : bold;">Add Category</button></a>
                                        </span>
                                </div>
                            </div>
                        </div>

                            <div class="table-responsive">
                            <table class="table table-striped b-t b-light" id = "Category_Table">
                            <thead>
                            <tr>
                                <th style="width:20px;"></th>
                                <th style = "color : black;">Category ID</th>
                                <th style = "color : black;">Category Name</th>
                                <th style = "color : black;"> Abbreviation</th>
                                <th style="width : 15px;"></th>
                                <th style="width : 80px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                while($row = mysqli_fetch_array($result))
                                {
                                    extract($row);
                            ?>

                                <tr>
                                    <td><label class="i-checks m-b-none"><input type="checkbox" name="check" value = "<?php echo $Category_ID;?>"><i></i></label></td>
                                    <td><?php echo ++$counter;?></td>
                                    <td><?php echo $row['Category_Name'];?></td>
                                    <td><?php echo $row['Category_Abbreviation'];?></td>
                                    <td>
                                    <a href="Admin Category Update.php?Category_ID=<?php echo $Category_ID;?>" class="active" ui-toggle-class="" title="Update Data"><i class="fa fa-check text-success text-active"></i></a>
                                    </td>
                                    <td>
                                    <a href="Admin Category Delete.php?Category_ID=<?php echo $Category_ID;?>" class="active" ui-toggle-class="" title="Delete Data"><i class="fa fa-times text-danger text"></i></a>
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