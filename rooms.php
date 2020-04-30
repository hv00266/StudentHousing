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
        <title>Rooms & Residence Halls</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css\index.css" type="text/css" />
    </head>
    <body>
        <nav>
            <ul>
                <li style="float:left;"> 
                    <a href="home.php"><strong>Student Housing Portal</strong></a>
                </li>
                <li id="login"><a href="index.php"><strong>Login</strong></a></li>
            </ul>
        </nav>
        <main>
            <div>
                <table style="width: 60%;" id="room-table">
                    <thead>
                        <tr>
                            <th>Residence Hall</th>
                            <th>Room</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                </table>

                <!-- <button class="button">Room Change Request Form</button> -->

                <div class="hallcard-container">
                    <div class="hallcard">
                        <div class="container" style="display: inline-block;">
                            <div class="col"><h4><b>Centennial Place</b></h4></div>
                            <div class="col"><p>Opened in 2009, Centennial Place provides 1001 students 
                                with a wide variety of housing styles located right in the middle of the activity of campus.  
                                Centennial Place predominantly houses first year students in semi-private housing assignments.</p></div>
                        </div>
                    </div>
                
                    <div class="hallcard">
                        <div class="container" style="display: inline-block;">
                            <div class="col"><h4><b>Eagle Village</b></h4></div>
                            <div class="col"><p>Opened in 2006, Eagle Village provides 798 first year students with a 
                                more independent style of living with the benefits and support of on-campus resources. 
                                Eagle Village is an excellent place for students who are looking for rooms with an 
                                independent lifestyle and opportunity to build friendships.</p></div>
                        </div>
                    </div>

                    <div class="hallcard">
                        <div class="container" style="display: inline-block;">
                            <div class="col"><h4><b>Freedom's Landing</b></h4></div>
                            <div class="col"><p>Purchased in 2011, Freedom’s Landing provides 976 upper class students 
                                with a more independent style of living with the benefits and support of on-campus 
                                resources. Freedom’s Landing is also open to transfer and graduate students in 2-Bedroom, 
                                3-Bedroom and 4-Bedroom units.</p></div>
                        </div>
                    </div>
                    
                    <div class="hallcard">
                        <div class="container" style="display: inline-block;">
                            <div class="col"><h4><b>Southern Courtyard</b></h4></div>
                            <div class="col"><p>Opened in 2003, Southern Courtyard houses 480 residents in apartments in 
                                an apartment style building with the support of on-campus resources.</p></div>
                        </div>
                    </div>

                    <div class="hallcard">
                        <div class="container" style="display: inline-block;">
                            <div class="col"><h4><b>Southern Pines</b></h4></div>
                            <div class="col"><p>Opened in 2003, Southern Pines is a modern residence hall with super suite 
                                style units.  Southern Pines houses 628 students including members of some of the athletic 
                                teams, the Innovation Living Learning Community, and the ROTC Theme Living Community.  Complex 
                                amenities include a clubhouse with computer lab, kitchen and classroom space, a volleyball court 
                                and great proximity to the campus pedestrium and other campus resources.</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php 
            if($_SESSION['eid'] != NULL){
        ?>
                <script type="text/javascript">
                    document.getElementById('login').style.display = 'none';
                </script>
        <?php } ?>
    </body>
</html>