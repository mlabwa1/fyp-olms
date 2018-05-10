<?php
if (isset($_POST['submit']))
{
    include('include/dbcon.php');

// add if needed to preview
//	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
//		echo "<h1>" . "File ". $_FILES['filename']['name'] ." Uploaded successfully." . "</h1>";
//		echo "<h2>Displaying contents:</h2>";
//		readfile($_FILES['filename']['tmp_name']);
//	}

    //Import uploaded file to Database

    $handle = fopen($_FILES['filename']['tmp_name'], "r");

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        mysqli_query($dbcon,"insert into book (book_title,category_id,author,author_2,author_3,author_4,author_5,book_copies,book_pub,publisher_name,isbn,copyright_year,status,book_barcode,book_image,date_added,remarks)
            values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]',NOW(),'$data[17]')");

    }

    fclose($handle);

    //print "Import done";
    echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
    echo "<script>document.location='book.php'</script>";
    //view upload form

    /*
    for ($lines = 0; $data = fgetcsv($handle,1000,",",'"'); $lines++) {
        if ($lines == 0) continue;
        for ($i = 0; $i <= 32; $i ++)
        {
            if (!isset($data[$i]))
                $data[$i] = '';
        }

        $import="INSERT into user (school_number, firstname ,middlename, lastname, contact, gender, address, type, level, section, status, user_added)
                  values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]') ";
        print $import;
        mysqli_query($import) or die(mysqli_error());
    }
    fclose($handle);
    print "Import done";*/
}


?>