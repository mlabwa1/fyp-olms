<!-- sidebar navigation -->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="home_member.php" class="site_title"><i class="fa fa-university"></i> <span>DMI</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <a href="member_profile.php">
            <div class="profile">
                <?php
                //include('include/dbcon.php');

                $user_query=mysqli_query($dbcon,"SELECT *  from user where user_id='$id_session'")or die(mysqli_error());
                $row=mysqli_fetch_array($user_query); 
                $school_number = $row['school_number'];
                {
                    ?>
                    <div class="profile_pic">
                        <?php if($row['user_image'] != ""): ?>
                            <img src="upload/<?php echo $row['user_image']; ?>" style="height:65px; width:75px;" class="img-thumbnail profile_img">
                        <?php else: ?>
                            <img src="images/user.png" style="height:65px; width:75px;" class="img-circle profile_img">
                        <?php endif; ?>
                    </div>

                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?php echo $row['firstname'].' '.$row['lastname']; ?></h2>
                    </div>
                <?php } ?>
            </div>
        </a>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3 style="margin-top:85px;">File Information</h3>
                <div class="separator"></div>
                <ul class="nav side-menu">
                    <li>
                        <a href="home_member.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="book_member.php"><i class="fa fa-book"></i> Books</a>
                    </li>
                    <?php
                    // $user_query  = mysql_query("SELECT * from admin where admin_id = '$id_session'")or die(mysql_error());
                    // $user_row =mysql_fetch_array($user_query);
                    // $admin_type  = $user_row['admin_type'];
                    ?>
                    <?php
                    // if ($admin_type != 'Encoder') {
                    ?>
                    <?php // } ?>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Transaction Information</h3>
                <div class="separator"></div>
                <ul class="nav side-menu">
                    <li>
                        <a id="<?php echo $school_number; ?>" href="borrow_book_member.php?school_number=<?php echo $school_number;?>"><i class="fa fa-book"></i>My Transactions</a>
                    </li>
                    <!--li>
                        <a href="returned_book_member.php?school_number=".$school_number><i class="fa fa-book"></i> Returned Books</a>  
                    </li-->
                    <li>
                        <a href="about_us_member.php"><i class= "fa fa-info"></i> Developers</a>
                    </li>
                    <!--- <li>
                         <a href="activity_log.php"><i class="fa fa-history"></i> Activity Log</a>
                     </li>-->
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
    </div>
</div>
<!-- end of sidebar navigation -->