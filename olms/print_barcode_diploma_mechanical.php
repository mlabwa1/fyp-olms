<?php include ('include/dbcon.php');?>
<?php
include('include/dbcon.php');
include('session.php');
$user_query=mysqli_query($dbcon,"select * from admin where admin_id='$id_session'")or die(mysqli_error($dbcon));
$row=mysqli_fetch_array($user_query); {
    ?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
<?php } ?>

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
        <img src = "images/dmi.png" style = " margin-top:-17px; float:left; margin-left:115px; margin-bottom:-6px; width:100px; height:100px;">
        <img src = "images/dmi.png" style = " margin-top:-17px; float:right; margin-right:115px; width:100px; height:100px;" >
        <center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; St. Joseph University Tanzania &nbsp;	&nbsp; </center>
        <center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp; Online Library Management System</center>
        <center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> St. Joseph College of engineering and technology </center>

        <button type="submit" id="print" onclick="printPage()">Print</button>
        <p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Members Barcode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
            <b style="color:blue;">Date Prepared:</b>
            <?php include('currentdate.php'); ?>
        </div>
        <br/>
        <br/>
        <?php
        $result= mysqli_query($dbcon,"select * from user where type='Diploma' and section='Mechanical Engineering' order by school_number ASC") or die (mysqli_error($dbcon));
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Barcode Image</th>
                <th>Registration No.</th>
                <th>Full Name</th>
                <th>Year</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row= mysqli_fetch_array ($result) ){
                $id=$row['user_id'];
                ?>
                <tr>
                    <td style="text-align:center;"><?php	echo "<img src = 'BCG/html/image.php?filetype=PNG&dpi=72&scale=1&rotation=0&font_family=Arial.ttf&font_size=10&text=".$row['school_number']."&thickness=50&start=NULL&code=BCGcode128' />";?></td>
                    <td style="text-align:center;"><?php echo $row['school_number']; ?></td>
                    <td style="text-align:center;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
                    <td style="text-align:center;"><?php echo $row['level']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
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



    </div>





</div>
</body>


</html>