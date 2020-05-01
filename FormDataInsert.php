<?php  
   include('config.php');

    $RFname = mysqli_real_escape_string($db, $_REQUEST['RFname']);
    $RLname = mysqli_real_escape_string($db, $_REQUEST['RLname']);
    $EID = mysqli_real_escape_string($db, $_REQUEST['EID']);
    $RA_EID = mysqli_real_escape_string($db, $_REQUEST['RA_EID']);
    $room_no = mysqli_real_escape_string($db, $_REQUEST['room#']); 
    $Bday = mysqli_real_escape_string($db, $_REQUEST['Bday']);
    $Sex = mysqli_real_escape_string($db, $_REQUEST['Sex']);
    $residence_hall = mysqli_real_escape_string($db, $_REQUEST['residence_hall']);
    $Phone_no = mysqli_real_escape_string($db, $_REQUEST['Phone_no']);
    $LLC_no = mysqli_real_escape_string($db, $_REQUEST['LLC_no']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Residents</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css\index.css" type="text/css" />
    </head>
    <body>
        <nav>
            <ul>
                <li style="float:left;"> 
                    <a href="home.php"><strong>Student Housing Portal</strong></a>
                </li>
                <li><a href="home.php"><strong>Home</strong></a></li>
            </ul>
        </nav>
    </body>
</html>
<?php
    $sql = "INSERT INTO Resident (EID, fname, lname, room_no, residence_hall, bday, sex, Llc_no, RA_EID) VALUES ('$EID', '$RFname', '$RLname', '$room_no', '$residence_hall', '$Bday', '$Sex', '$LLC_no', '$RA_EID')";
    if(mysqli_query($db, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }

    mysqli_close($db);
?>