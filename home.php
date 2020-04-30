<?php
   include("config.php");
   session_start();

   $eid = $_SESSION['eid'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
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
            <div class="card-container">
                <div class="column">
                <a class="cardLink" href="rough%20resident%20page.html"><div class="card">
                    <div class="container" style="display: inline-block;">
                        <h4><b>Residents</b></h4>
                        <p>Sign up for a dorm</p>
                    </div>
                </div></a>
                </div>
                <div class="column">
                <a class="cardLink" href="rough%20llc%20page.php"><div class="card">
                    <div class="container" style="display: inline-block;">
                        <h4><b>Living Learning Centers</b></h4>
                        <p>Learn about our LLCs</p>
                    </div>
                </div></a>
                </div>
                <div class="column">
                <a class="cardLink" href="rooms.php"><div class="card">
                    <div class="container" style="display: inline-block;">
                        <h4><b>Rooms</b></h4>
                        <p>View available dorms</p>
                    </div>
                </div></a>
                </div>
                <div class="column">
                <a class="cardLink" href="director.php"><div class="card">
                    <div class="container" style="display: inline-block;">
                        <h4><b>Directors</b></h4>
                        <p>Director Info</p>
                    </div>
                </div></a>
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