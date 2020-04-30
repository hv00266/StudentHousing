<?php
   include("config.php");
   session_start();

   $eid = $_SESSION['eid'];

   $query = "SELECT * FROM Director";
   $result = mysqli_query($db, $query);

    if(!$result) { 
        die('Could not get data: ' . mysql_error());
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
            <a class="cardLink" href="rough%20resident%20page.html"><div class="card">
                <div class="container" style="display: inline-block;">
                    <h4><b>Residents</b></h4>
                    <p>Sign up for a dorm</p>
                </div>
            </div></a>
            <a class="cardLink" href="rough%20llc%20page.php"><div class="card">
                <div class="container" style="display: inline-block;">
                    <h4><b>Living Learning Centers</b></h4>
                    <p>Learn about our LLCs</p>
                </div>
            </div></a>
            <a class="cardLink" href="rooms.php"><div class="card">
                <div class="container" style="display: inline-block;">
                    <h4><b>Rooms</b></h4>
                    <p>View available dorms</p>
                </div>
            </div></a>
        </main>
    </body>
</html>