<?php include ('include/dbcon.php');
include("timezone.php");

include('include/dbcon.php');
include('session.php');
$user_query=mysqli_query($dbcon,"select * from admin where admin_id='$id_session'")or die(mysqli_error($dbcon));
$row=mysqli_fetch_array($user_query); {

?>
<html>

<head>
    <title>Online Library Management System</title>

    <style>


        .container {
            width:100%;
            margin:auto;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table-striped tbody > tr:nth-child(odd) > td,
        .table-striped tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9;
        }

        @media print{
            #print {
                display:none;
            }
        }

        #print {
            width: 90px;
            height: 30px;
            font-size: 18px;
            background: white;
            border-radius: 4px;
            margin-left:28px;
            cursor:hand;
        }

    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>

</head>


<body>
<div class = "container">
    <div id = "header">
        <br/>
        <?php include("printing_header.php") ?>
        <button type="submit" id="print" onclick="printPage()">Print</button>
        <p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Borrowed Books Monitoring&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
            <b style="color:blue;">Date Prepared:</b>
            <?php include('currentdate.php'); ?>
        </div>
        <br/>
        <?php
        $borrow_query = mysqli_query($dbcon,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									WHERE borrowed_status = 'borrowed'
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_error($dbcon));
        $borrow_count = mysqli_num_rows($borrow_query);
        ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Barcode</th>
                <th>Borrower Name</th>
                <th>Year</th>
                <th>Department</th>
                <th>Title</th>
                <th>Date Borrowed</th>
                <th>Due Date</th>
                <!--<th>Date Returned</th>-->
            </tr>
            </thead>
            <tbody>
            <?php
            while($borrow_row = mysqli_fetch_array($borrow_query)){
                $id = $borrow_row ['borrow_book_id'];
                $book_id = $borrow_row ['book_id'];
                $user_id = $borrow_row ['user_id'];
                ?>
                <tr>
                    <td style="text-align:center;"><?php echo $borrow_row['book_barcode']; ?></td>
                    <td style="text-align:center;" style="text-transform: capitalize"><?php echo $borrow_row['firstname']." ".$borrow_row['middlename']." ".$borrow_row['lastname']; ?></td>
                    <td style="text-align:center;" style="text-transform: capitalize"><?php echo $borrow_row['level']; ?></td>
                    <td style="text-align:center;" style="text-transform: capitalize"><?php echo $borrow_row['section']; ?></td>
                    <td style="text-align:center;" style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
                    <td style="text-align:center;"><?php date_default_timezone_set('Africa/Nairobi'); echo date("M d, Y h:i:sa",strtotime($borrow_row['date_borrowed'])); ?></td>
                    <td style="text-align:center;"><?php date_default_timezone_set('Africa/Nairobi');  echo date("M d, Y h:i:sa",strtotime($borrow_row['due_date'])); ?></td>
                    <!--<td style="text-align:center;"><?php //date_default_timezone_set('Africa/Nairobi'); echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:i:sa",strtotime($borrow_row['date_returned'])); ?></td>-->
                    <?php
                    //	if ($borrow_row['borrowed_status'] != 'returned') {
                    //		echo "<td class='alert alert-success'  style='text-align:center;'>".$borrow_row['borrowed_status']."</td>";
                    //	} else {
                    //		echo "<td class='alert alert-danger'  style='text-align:center;'>".$borrow_row['borrowed_status']."</td>";
                    //	}
                    ?>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>

        <br />
        <br />
        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
        <?php } ?>


    </div>





</div>
</body>


</html>