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
                <li id="logout"><a href="index.php"><strong>Log Out</strong></a></li>
            </ul>
        </nav>
        <main>
            <div class="card-container">
                <div class="column">
                <a class="cardLink" href="residentform.html"><div class="card">
                    <div class="container" style="display: inline-block;">
                        <h4><b>Residents</b></h4>
                        <p>Sign up for a dorm</p>
                    </div>
                </div></a>
                </div>
                <div class="column">
                <a class="cardLink" href="llcpage.html"><div class="card">
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
                <a class="cardLink" href="directorpage.html"><div class="card">
                    <div class="container" style="display: inline-block;">
                        <h4><b>Directors</b></h4>
                        <p>Director info</p>
                    </div>
                </div></a>
                </div>
            </div>

            <div id="myresidents">
                    <a class="cardLink" href="myresidents.php"><div class="card">
                        <div class="container" style="display: inline-block;">
                            <h3><b>My Residents</b></h3>
                            <p>See resident info</p>
                        </div>
                    </div></a>
            </div>
        </main>
        <?php 
            if($_SESSION['eid'] != NULL){
        ?>
                <script type="text/javascript">
                    document.getElementById('login').style.display = 'none';
                </script>
        <?php
            }
            else {
        ?>
                <script type="text/javascript">
                    document.getElementById('logout').style.display = 'none';
                </script>
        <?php }

            if($_SESSION['role'] == 'Resident'){
        ?>
                <script type="text/javascript">
                    document.getElementById('myresidents').style.display = 'none';
                </script>
        <?php } ?>
    </body>
</html>