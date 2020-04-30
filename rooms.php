<?php
   include("config.php");
   session_start();

   $eid = $_SESSION['eid'];

   $query = "SELECT residence_hall, room_number, room_state FROM Room";
   $result = mysqli_query($db, $query);

    if(!$result) { 
        die('Could not get data: ' . mysqli_error($db));
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css\index.css" type="text/css" />
    </head>
    <body>
        <nav>
            <ul>
                <li style="float:left;"> 
                    <a href=""><strong>Student Housing Portal</strong></a>
                </li>
                <li><a href="index.php"><strong>Login</strong></a></li>
            </ul>
        </nav>
        <main>
        <div id="room-table">
                    <table style="width: 60%;">
                        <thead>
                            <tr class="th2">
                                <th>Residence Hall</th>
                                <th>Room</th>
                                <th>Status</th>
                            </tr>
                            <?php
                                while($r = mysqli_fetch_array($result)):
                            ?>
                            <tr>
                                <td><?php echo $r['residence_hall']; ?></td>
                                <td style="text-align: center;"><?php echo $r['room_number']; ?></td>
                                <td><?php echo $r['room_state']; ?></td>
                            </tr>
                            <?php 
                                endwhile;
                            ?>
                        </thead>
                    </table>
                </div>
        </main>
    </body>
</html>