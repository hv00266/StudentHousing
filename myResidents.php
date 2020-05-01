<?php
   include("config.php");
   session_start();

   $eid = $_SESSION['eid'];

    if($_SESSION['role'] == "RA"){
        $query = "SELECT EID, fname, lname, room_no, residence_hall, sex, bday, Llc_no, RA_EID FROM Resident
        WHERE RA_EID = $eid";
    }
    elseif($_SESSION['role'] == "Director"){
        $query = "SELECT EID, fname, lname, room_no, residence_hall, sex, bday, Llc_no, RA_EID FROM Resident r
        LEFT OUTER JOIN Director d ON r.residence_hall = d.Dir_assignment
        WHERE d.Dir_eid = $eid";
    }
    else {
        header("Location: home.php");
    }
    
    $result = mysqli_query($db, $query);

    if(!$result) { 
        die('Could not get data: ' . mysqli_error($db));
    }
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
                <li><a href="index.php"><strong>Log Out</strong></a></li>
                <li><a href="home.php"><strong>Home</strong></a></li>
            </ul>
        </nav>
        <main>
            <div>
                <table style="width: 80%;" id="room-table">
                    <thead>
                        <tr>
                            <th>EID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Room #</th>
                            <th>Residence Hall</th>
                            <th>Sex</th>
                            <th>DOB</th>
                            <th>Llc #</th>
                            <th>RA EID</th>
                            <th class="dironly">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($r = mysqli_fetch_array($result)):
                        ?>
                        <tr>
                            <td><?php echo $r['EID']; ?></td>
                            <td><?php echo $r['fname']; ?></td>
                            <td><?php echo $r['lname']; ?></td>
                            <td><?php echo $r['room_no']; ?></td>
                            <td><?php echo $r['residence_hall']; ?></td>
                            <td><?php echo $r['sex']; ?></td>
                            <td><?php echo $r['bday']; ?></td>
                            <td><?php echo $r['Llc_no']; ?></td>
                            <td><?php echo $r['RA_EID']; ?></td>
                            <td class="dironly"><a class="edit_btn" href="editRes.php?edit=<?php echo $r['EID']; ?>"><button>Edit</button></a></th>
                        </tr>
                        <?php 
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php 
            if($_SESSION['role'] != 'Director'){
        ?>
                <script type="text/javascript">
                    var x = document.getElementsByClassName('dironly');
                    for(var i=0; i < x.length; i++){
                        x[i].style.display = "none";
                    }
                </script>
        <?php } ?>
    </body>
</html>