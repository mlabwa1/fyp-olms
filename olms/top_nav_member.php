<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <?php
                include('include/dbcon.php');
                $user_query=mysqli_query($dbcon,"SELECT * from user where user_id='$id_session'")or die(mysqli_error($dbcon));
                $row=mysqli_fetch_array($user_query); {
                    ?>
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                            <?php if($row['user_image'] != ""): ?>
                                <img src="upload/<?php echo $row['user_image']; ?>">
                            <?php else: ?>
                                <img src="images/user.png">
                            <?php endif; ?>	<?php echo $row['firstname'].' '.$row['lastname']; ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">

                            <!---   <li>
                                   <a href="admin_profile.php"><i class="fa fa-user pull-right"></i> Profile</a>
                               </li>-->
                            <!---   <li>
                                   <a href="change_password.php"><i class="glyphicon glyphicon-edit pull-right"></i> Change Password</a>
                               </li> -->
                            <li>
                                <a href="logout_members.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation -->