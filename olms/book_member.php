<?php include ('header_member.php'); ?>

    <div class="page-title">
        <div class="title_left">
            <h3>
                <small>Home /</small> Books
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <br />
                <br />
                <div class="x_title">
                    <h2><i class="fa fa-book"></i> Book List</h2>
                    <ul class="nav navbar-right panel_toolbox">

                        <!-- If needed
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
						-->

                    </ul>
                    <div class="clearfix"></div>
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="book_member.php">All</a></li>
                        <li role="presentation"><a href="general_member.php">General Engineering</a></li>
                        <li role="presentation"><a href="civil_member.php">Civil Engineering</a></li>
                        <li role="presentation"><a href="cse_member.php">CSE</a></li>
                        <li role="presentation"><a href="ece_member.php">ECE</a></li>
                        <li role="presentation"><a href="eee_member.php">EEE</a></li>
                        <li role="presentation"><a href="computer_member.php">Education</a> </li>
                        <li role="presentation"><a href="isne_member.php">ISNE</a></li>
                        <li role="presentation"><a href="mechanical_member.php">Mechanical Engineering</a></li>
                        <li role="presentation"><a href="digital.php">Soft Copies</a> </li>
                    </ul>

                    <!--<ul class="nav nav-pills">
                            <li role="presentation" class="active"><a href="book.php">All</a></li>
                            <li role="presentation" ><a href="new_books.php">New Books</a></li>
                            <li role="presentation"><a href="old_books.php">Old Books</a></li>
                            <li role="presentation"><a href="lost_books.php">Lost Books</a></li>
                            <li role="presentation"><a href="damage_books.php">Damaged Books</a></li>
                            <li role="presentation"><a href="sub_rep.php">Subject for Replacement Books</a></li>
                            <li role="presentation"><a href="hard_bound.php">Hardbound Books</a></li>
                            <li role="presentation"><a href="departments.php">Departments</a> </li>
                        </ul>-->
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- content starts here -->

                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                            <thead>
                            <tr>
                                <th style="width:100px;">Book Image</th>
                                <th>Title</th>
                                <th>Author/s</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $result= mysqli_query($dbcon,"select * from book order by book_id DESC ") or die (mysqli_error());
                            while ($row= mysqli_fetch_array ($result) ){
                                $id=$row['book_id'];
                                $category_id=$row['category_id'];

                                $cat_query = mysqli_query($dbcon,"select * from category where category_id = '$category_id'")or die(mysqli_error());
                                $cat_row = mysqli_fetch_array($cat_query);
                                ?>
                                <tr>
                                    <td>
                                        <?php if($row['book_image'] != ""): ?>
                                            <img src="upload/<?php echo $row['book_image']; ?>" class="img-thumbnail" width="75px" height="50px">
                                        <?php else: ?>
                                            <img src="images/book_image.jpg" class="img-thumbnail" width="75px" height="50px">
                                        <?php endif; ?>
                                    </td>  <!--- either this <td><a target="_blank" href="view_book_barcode.php?code=<?php // echo $row['book_barcode']; ?>"><?php // echo $row['book_barcode']; ?></a></td> -->

                                    <td style="word-wrap: break-word; width: 20em;"><?php echo $row['book_title']; ?></td>
                                    <td style="word-wrap: break-word; width: 20em;"><?php echo $row['author']; ?></td>
                                    <td><?php echo $cat_row['classname']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['remarks']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- content ends here -->
                </div>
            </div>
        </div>
    </div>

<?php include ('footer.php'); ?>