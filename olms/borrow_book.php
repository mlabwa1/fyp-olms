<?php include ('header.php'); ?>
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
                                <th>Action</th>
                                <?php
                                $borrow_query = mysqli_query($dbcon,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error($dbcon));
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

                                $penalty_amount_query= mysqli_query($dbcon,"select * from penalty order by penalty_id DESC ") or die (mysqli_error($dbcon));
                                $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);

                                if ($date_returned > $due_date) {
                                    $penalty = round((integer)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
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
                                <td>
                                    <form method="post" action="">
                                        <input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
                                        <input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
                                        <input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
                                        <input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
                                        <input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
                                        <input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
                                        <button name="return_now" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Return</button>
                                    </form>
                                </td>

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

                                $update_copies = mysqli_query ($dbcon,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error($dbcon));
                                $copies_row= mysqli_fetch_assoc($update_copies);

                                $book_copies = $copies_row['book_copies'];
                                $new_book_copies = $book_copies + 1;

                                if ($new_book_copies == '0') {
                                    $remark = 'Not Available';
                                } else {
                                    $remark = 'Available';
                                }

                                mysqli_query($dbcon,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id'") or die (mysqli_error($dbcon));
                                mysqli_query($dbcon,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ") or die (mysqli_error($dbcon));

                                $timezone = "Africa/Nairobi";
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                $cur_date = date("Y-m-d H:i:s");
                                $date_returned_now = date("Y-m-d H:i:s");
                                //$due_date = strtotime($cur_date);
                                //$due_date = strtotime("+3 day", $due_date);
                                //$due_date = date('F j, Y g:i a', $due_date);
                                ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));

                                $penalty_amount_query= mysqli_query($dbcon,"select * from penalty order by penalty_id DESC ") or die (mysqli_error($dbcon));
                                $penalty_amount = mysqli_fetch_assoc($penalty_amount_query);

                                if ($date_returned > $due_date) {
                                    $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
                                } elseif ($date_returned < $due_date) {
                                    $penalty = 'No Penalty';
                                } else {
                                    $penalty = 'No Penalty';
                                }

                                mysqli_query ($dbcon,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error($dbcon));

                                mysqli_query ($dbcon,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error($dbcon));

                                $report_history1=mysqli_query($dbcon,"select * from admin where admin_id = $id_session ") or die (mysqli_error($dbcon));
                                $report_history_row1=mysqli_fetch_array($report_history1);
                                $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];

                                mysqli_query($dbcon,"INSERT INTO report 
									(book_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error($dbcon));

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

                    <div class="row" style="margin-top:30px;">
                        <form method="post">
                            <div class="col-xs-4">
                                <input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="barcode" placeholder="Enter barcode here....." autofocus required />
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <form method="post" action="">
                                <th style="width:100px;">Book Image</th>
                                <th>Barcode</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Status</th>
                                <th>Action</th>
                                <?php
                                if (isset($_POST['barcode'])){
                                    $barcode = $_POST['barcode'];

                                    $book_query = mysqli_query($dbcon,"SELECT * FROM book WHERE book_barcode = '$barcode' ") or die (mysqli_error($dbcon));
                                    $book_count = mysqli_num_rows($book_query);
                                    $book_row = mysqli_fetch_array($book_query);

                                    if ($book_row['book_barcode'] != $barcode){
                                        echo '
											<table>
												<tr>
													<td class="alert alert-info">No match for the barcode entered!</td>
												</tr>
											</table>
										';
                                    } elseif ($barcode == '') {
                                        echo '
											<table>
												<tr>
													<td class="alert alert-info">Enter the correct details!</td>
												</tr>
											</table>
										';
                                    }else{
                                        ?>
                                        <tr>
                                            <input type="hidden" name="user_id" value="<?php echo $user_row['user_id'] ?>">
                                            <input type="hidden" name="book_id" value="<?php echo $book_row['book_id'] ?>">

                                            <td>
                                                <?php if($book_row['book_image'] != ""): ?>
                                                    <img src="upload/<?php echo $book_row['book_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                                <?php else: ?>
                                                    <img src="images/book_image.jpg" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $book_row['book_barcode'] ?></td>
                                            <td style="text-transform: capitalize"><?php echo $book_row['book_title'] ?></td>
                                            <td style="text-transform: capitalize"><?php echo $book_row['author'] ?></td>
                                            <td><?php echo $book_row['isbn'] ?></td>
                                            <td><?php echo $book_row['status'] ?></td>
                                            <td><button name="borrow" class="btn btn-info"><i class="fa fa-check"></i> Borrow</button></td>
                                        </tr>
                                    <?php } }?>

                                <?php

                                $allowable_days_query= mysqli_query($dbcon,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error($dbcon));
                                $allowable_days_row = mysqli_fetch_assoc($allowable_days_query);

                                $timezone = "Africa/Nairobi";
                                if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                $cur_date = date("Y-m-d H:i:s");
                                $date_borrowed = date("Y-m-d H:i:s");
                                $due_date = strtotime($cur_date);
                                $due_date = strtotime("+".$allowable_days_row['no_of_days']." day", $due_date);
                                $due_date = date('Y-m-d H:i:s', $due_date);
                                ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
                                ?>
                                <input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16" maxlength="10"  />
                                <input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>" size="16" maxlength="10"  />

                                <?php
                                if (isset($_POST['borrow'])){
                                    $user_id =$_POST['user_id'];
                                    $book_id =$_POST['book_id'];
                                    $date_borrowed =$_POST['date_borrowed'];
                                    $due_date =$_POST['due_date'];

                                    $trapBookCount= mysqli_query ($dbcon,"SELECT count(*) as books_allowed from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed'") or die (mysqli_error($dbcon));

                                    $countBorrowed = mysqli_fetch_assoc($trapBookCount);

                                    $bookCountQuery= mysqli_query ($dbcon,"SELECT count(*) as book_count from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed' and book_id = $book_id") or die (mysqli_error($dbcon));

                                    $bookCount = mysqli_fetch_assoc($bookCountQuery);

                                    $allowed_book_query= mysqli_query($dbcon,"select * from allowed_book order by allowed_book_id DESC ") or die (mysqli_error($dbcon));
                                    $allowed = mysqli_fetch_assoc($allowed_book_query);

                                    if ($countBorrowed['books_allowed'] == $allowed['qntty_books']){
                                        echo "<script>alert(' ".$allowed['qntty_books']." ".'Books Allowed per User!'." '); window.location='borrow_book.php?school_number=".$school_number."'</script>";
                                    }elseif ($bookCount['book_count'] == 1){
                                        echo "<script>alert('Book Already Borrowed!'); window.location='borrow_book.php?school_number=".$school_number."'</script>";
                                    }else{

                                        $update_copies = mysqli_query ($dbcon,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error($dbcon));
                                        $copies_row= mysqli_fetch_assoc($update_copies);

                                        $book_copies = $copies_row['book_copies'];
                                        $new_book_copies = $book_copies - 1;

                                        if ($new_book_copies < 0){
                                            echo "<script>alert('Book out of Copy!'); window.location='borrow_book.php?school_number=".$school_number."'</script>";
                                        }elseif ($copies_row['status'] == 'Damaged'){
                                            echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?school_number=".$school_number."'</script>";
                                        }elseif ($copies_row['status'] == 'Lost'){
                                            echo "<script>alert('Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?school_number=".$school_number."'</script>";
                                        }else{

                                            if ($new_book_copies == '0') {
                                                $remark = 'Not Available';
                                            } else {
                                                $remark = 'Available';
                                            }

                                            mysqli_query($dbcon,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id' ") or die (mysqli_error($dbcon));
                                            mysqli_query($dbcon,"UPDATE book SET remarks = '$remark' where book_id = '$book_id' ") or die (mysqli_error($dbcon));

                                            mysqli_query($dbcon,"INSERT INTO borrow_book(user_id,book_id,date_borrowed,due_date,borrowed_status)
									VALUES('$user_id','$book_id','$date_borrowed','$due_date','borrowed')") or die (mysqli_error($dbcon));

                                            $report_history=mysqli_query($dbcon,"select * from admin where admin_id = $id_session ") or die (mysqli_error($dbcon));
                                            $report_history_row=mysqli_fetch_array($report_history);
                                            $admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];

                                            mysqli_query($dbcon,"INSERT INTO report 
									(book_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$book_id','$user_id','$admin_row','Borrowed Book',NOW())") or die(mysqli_error($dbcon));

                                    


//********************************************************* SEND EMAIL *******************************************************//
$emailsql=mysqli_query($dbcon,"SELECT * FROM user WHERE school_number='$school_number'") or die(mysqli_error($dbcon));
$student = mysqli_fetch_array($emailsql);
$email = $student['email'];
$user = $student['firstname']." ".$student['middlename']." ".$student['lastname'];
//$email = 'navish45@gmail.com';

//include('include/dbcon.php');
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
//var_dump($email);
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'mlabwa.dm@gmail.com';          // SMTP username
$mail->Password = 'SUPERboy'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
//$mail->SMTPDebug = 4; //Display specific errors

    $mail->setFrom('mlabwa.dm@gmail.com', 'DMI Library');
    $mail->addReplyTo('mlabwa.dm@gmail.com', 'LMS');
    $mail->addAddress($email);   // Add a recipient

    $mail->isHTML(true);  // Set email format to HTML

    $bodyContent = '<h1>You have borrowed a book</h1>';
    $bodyContent .= '<p>Hi '.$user.', your ID was used to borrow a book at the library.  If you did not perform this transaction, kindly confirm with the library administration.</p>';

    $mail->Subject = 'Email from Localhost by LMS';
    $mail->Body    = $bodyContent;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


//****************************************************** SEND EMAIL ********************************************************//
                                        }
                                    }
                                    ?>
                                    <script>
                                        window.location="borrow_book.php?school_number=<?php echo $school_number ?>";
                                        include ('sendmessage.php');
                                    </script>
                                    <?php
                                }
                                ?>
                            </form>
                        </table>

                    </div>
                </div>


                <!-- content ends here -->
            </div>
        </div>
    </div>

<?php include ('footer.php'); ?>