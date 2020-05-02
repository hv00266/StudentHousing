<?php
    include('config.php');
    session_start();

    $edit_eid = $_REQUEST['edit'];
    
    $query = "SELECT * FROM Resident WHERE EID=$edit_eid";
    $record = mysqli_query($db, $query) or die(mysqli_error());

    $r = mysqli_fetch_assoc($record);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Resident</title>
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
        <h1>Update Record</h1>
        <?php
            $status = "";
            if(isset($_POST['new']) && $_POST['new']==1) {
                $eid=$_REQUEST['eid'];
                $fname = $_REQUEST['fname'];
                $lname = $_REQUEST['lname'];
                $room_no = $_REQUEST['room_no'];
                $residence_hall = $db->real_escape_string($_REQUEST['residenceHall']);
                $bday = $_REQUEST['bday'];
                $sex = $_REQUEST['sex'];
                $llc_no = $_REQUEST['llc_no'];
                $ra_eid = $_REQUEST['ra_eid'];

                $update="update Resident set fname='".$fname."',
                lname='".$lname."', room_no='".$room_no."',
                residence_hall='".$residence_hall."', bday='".$bday."',
                sex='".$sex."', Llc_no='".$llc_no."',
                RA_EID='".$ra_eid."' where EID='".$eid."'";

                mysqli_query($db, $update) or die('Could not get data: ' . mysqli_error($db));;
                
                $status = "Record Updated Successfully. </br></br>
                <a href='myresidents.php'>View Updated Record</a>";
                echo '<p">'.$status.'</p>';
            }
            else {
        ?>
        <form name="form" method="post" action="" >
            <input type="hidden" name="new" value="1"/>
            <div class="input-group">
                <input type="hidden" name="eid" value="<?php echo $edit_eid; ?>" readonly>
            </div>
            <div class="input-group">
                <label>First Name</label><br>
                <input type="text" name="fname" value="<?php echo $r['fname']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>Last Name</label><br>
                <input type="text" name="lname" value="<?php echo $r['lname']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>Room #</label><br>
                <input type="text" name="room_no" value="<?php echo $r['room_no']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>Residence Hall</label><br>
                <input type="text" name="residenceHall" value="<?php echo $r['residence_hall']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>Birthday</label><br>
                <input type="date" name="bday" value="<?php echo $r['bday']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>Sex</label><br>
                <input type="text" name="sex" value="<?php echo $r['sex']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>LLC #</label><br>
                <input type="text" name="llc_no" value="<?php echo $r['Llc_no']; ?>">
            </div><br><br>
            <div class="input-group">
                <label>RA EID</label><br>
                <input type="text" name="ra_eid" value="<?php echo $r['RA_EID']; ?>">
            </div><br><br>
            <div class="input-group">
                <input class="btn" type="submit" name="save" value="Save">
            </div>
        </form>
        <?php } ?>
    </body>
</html>