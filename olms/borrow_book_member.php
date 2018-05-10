<?php /*include ('header_member.php'); ?>
    <div class="clearfix"></div>



<?php include('slide.php'); ?>


<?php include ('footer.php'); */?>





<?php include ('header_member.php'); ?>
<?php
$school_number = $_GET['school_number'];

$user_query = mysqli_query($dbcon,"SELECT * FROM user WHERE school_number = '$school_number' ");
$user_row = mysqli_fetch_array($user_query);
?>
    <div class="page-title">
        <div class="title_left">
            <h3>
                <small>Home /</small> Borrowed Transaction
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                    <?php
                    $sql = mysqli_query($dbcon,"SELECT * FROM user WHERE school_number = '$school_number' ");
                    $row = mysqli_fetch_array($sql);
                    ?>
                    <h2>
                        Borrower Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- content starts here -->

                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

                            <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Date Borrowed</th>
                                <th>Due Date</th>
                                <th>Penalty</th>
                                <!--th>Action</th-->
                                <?php
                                $borrow_query = mysqli_query($dbcon,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error());
                                $borrow_count = mysqli_num_rows($borrow_query);
                                while($borrow_row = mysqli_fetch_array($borrow_query)){
                                $due_date= $borrow_row['due_date'];

                                $timezone = "Africa/Nairobi";
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                $cur_date = date("Y-m-d H:i:s");
                                $date_returned = date("Y-m-d H:i:s");
                                //$due_date = strtotime($cur_date);
                                //$due_date = strtotime("+3 day", $due_date);
                                //$due_date = date('F j, Y g:i a', $due_date);
                                ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));

                                $penalty_amount_query= mysqli_query($dbcon,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
                                $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);

                                if ($date_returned > $due_date) {
                                    $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                } elseif ($date_returned < $due_date) {
                                    $penalty = 'No Penalty';
                                } else {
                                    $penalty = 'No Penalty';
                                }
                                ?>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>

                                <td><?php echo $borrow_row['book_barcode']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
                                <td style="text-transform: capitalize"><?php echo $borrow_row['author']; ?></td>
                                <td><?php echo $borrow_row['isbn']; ?></td>
                                <td><?php echo date("M d, Y h:i:sa",strtotime($borrow_row['date_borrowed'])); ?></td>
                                <?php
                                if ($borrow_row['status'] != 'Hardbound') {
                                    echo "<td>".date('M d, Y h:i:sa',strtotime($borrow_row['due_date']))."</td>";
                                } else {
                                    echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                }
                                ?>
                                <!---	<td><?php // echo date("M d, Y h:i:sa",strtotime($borrow_row['due_date'])); ?></td>	-->
                                <?php
                                if ($borrow_row['status'] != 'Hardbound') {
                                    echo "<td>".$penalty."</td>";
                                } else {
                                    echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                }
                                ?>
                                <!---	<td><?php // echo $penalty; ?></td>	-->
                                

                            </tr>

                            <?php
                            }
                            if ($borrow_count <= 0){
                                echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No books borrowed</td>
										</tr>
									</table>
								';
                            }
                            ?>
                            <?php
                            if (isset($_POST['return_now'])) {
                                $user_id= $_POST['user_id'];
                                $borrow_book_id= $_POST['borrow_book_id'];
                                $book_id= $_POST['book_id'];
                                $date_borrowed= $_POST['date_borrowed'];
                                $due_date= $_POST['due_date'];
                                $date_returned = $_POST['date_returned'];

                                $update_copies = mysqli_query ($dbcon,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
                                $copies_row= mysqli_fetch_assoc($update_copies);

                                $book_copies = $copies_row['book_copies'];
                                $new_book_copies = $book_copies + 1;

                                if ($new_book_copies == '0') {
                                    $remark = 'Not Available';
                                } else {
                                    $remark = 'Available';
                                }

                                mysqli_query($dbcon,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id'") or die (mysqli_error());
                                mysqli_query($dbcon,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ") or die (mysqli_error());

                                $timezone = "Africa/Nairobi";
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                $cur_date = date("Y-m-d H:i:s");
                                $date_returned_now = date("Y-m-d H:i:s");
                                //$due_date = strtotime($cur_date);
                                //$due_date = strtotime("+3 day", $due_date);
                                //$due_date = date('F j, Y g:i a', $due_date);
                                ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));

                                $penalty_amount_query= mysqli_query($dbcon,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
                                $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);

                                if ($date_returned > $due_date) {
                                    $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                } elseif ($date_returned < $due_date) {
                                    $penalty = 'No Penalty';
                                } else {
                                    $penalty = 'No Penalty';
                                }

                                mysqli_query ($dbcon,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());

                                mysqli_query ($dbcon,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error());

                                $report_history1=mysqli_query($dbcon,"select * from admin where admin_id = $id_session ") or die (mysqli_error());
                                $report_history_row1=mysqli_fetch_array($report_history1);
                                $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];

                                mysqli_query($dbcon,"INSERT INTO report 
									(book_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error());

                                ?>
                                <script>
                                    window.location="borrow_book.php?school_number=<?php echo $school_number ?>";
                                </script>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>

                    

                <!-- content ends here -->
            </div>
        </div>
    </div>

<?php include ('footer.php'); ?>