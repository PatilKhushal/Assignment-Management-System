<div class="sticky-header header-section " style = "height : 60px;">
    <div class="header-left">

        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                        <!--toggle button end-->

    </div>

    <?php 
        $User = $_SESSION['StudentUserName'];
        $query = "select * from student where AadharNo = '$User'";
        $res = mysqli_query($con, $query) or die(mysqli_error($con));

        $row = mysqli_fetch_array($res);
        extract($row);

        $Path = "Students\\".$row['Photo'];

    ?>
    
    <div class="header-right">
        
        <div class="profile_details">		
            
            <ul>
                
                <li class="dropdown profile_details_drop">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">	
                            <span class="prfil-img"><img src="<?php echo $Path;?>" style = "width : 50px;height : 50px;"> </span> 
                            <div class="user-name">
                                <p>UserName</p>
                                <span><?php echo $User;?></span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>	
                        </div>	

                    </a>

                    <ul class="dropdown-menu drp-mnu">
                        
                        <li> <a href="Student Profile Update.php?AadharNumber=<?php echo $User;?>"><i class="fa fa-image"></i>Change Profile Image</a> </li>
                        <li> <a href="Student logout.php"><i class="fa fa-sign-out"></i>Logout</a> </li>

                    </ul>

                </li>

            </ul>

        </div>

        <div class="clearfix"> </div>	

    </div>

    <div class="clearfix"> </div>	

</div>