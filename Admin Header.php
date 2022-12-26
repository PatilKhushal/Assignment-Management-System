<div class="sticky-header header-section " style = "height : 60px;">
    <div class="header-left">

        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                        <!--toggle button end-->

    </div>
    
    <div class="header-right">
        
        <div class="profile_details">		
            
            <ul>
                
                <li class="dropdown profile_details_drop">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">	
                            <div class="user-name">
                                <p>UserName</p>
                                <span><?php echo $_SESSION['UserName'];?></span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>	
                        </div>	

                    </a>

                    <ul class="dropdown-menu drp-mnu">
                        
                        <li> <a href="Admin logout.php"><i class="fa fa-sign-out"></i>Logout</a> </li>

                    </ul>

                </li>

            </ul>

        </div>

        <div class="clearfix"> </div>	

    </div>

    <div class="clearfix"> </div>	

</div>