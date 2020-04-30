<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        //get eid and password from post request
        $eid = mysqli_real_escape_string($db,$_POST['eid']);
        //$password = mysqli_real_escape_string($db,$_POST['password']); 
        
        //query Users table to check if user exists
        $query = "SELECT * FROM Resident WHERE EID = '$eid'/*  and userPassword = '$password' */";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $fName = $row['fname'];
        $eid = $row['EID'];
      
        $count = mysqli_num_rows($result);
       
        //if user exists
        if($count == 1) 
        {
            //set session variables
            $_SESSION['fname'] = $fName;
            $_SESSION['eid'] = $eid;            
         
            //redirect to dashboard
            header("Location: userPage.php");
        }
        else 
        {
            //$_SESSION['fname'] = $fName;
            $_SESSION['eid'] = $eid;       
            //redirect to index page
            header("Location: userpage.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student Housing Portal</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/studenthousing/css/index.css" type="text/css" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  </head>
  <body>
    <nav>
      <ul>
        <li style="float:left;"> 
          <a href="#home" style=""><strong>Student Housing Portal</strong></a>
        </li>
      </ul>
    </nav>

    <main>
      <div id="login-container">
        <h1>Student Housing Portal <span class="orange"></span></h1>
        <div class="login">
            <h2>Login</h2>
            <form name="login" action="index.php" method="POST">
                <label for="eid">EID</label>
                <input type="text" id="eid" name="eid" placeholder="123456789" />

                <!-- <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="*******" /> -->

                <div class="center">
                    <input type="submit" value="Submit" class="right"/>
                </div>
            </form>
        </div>
      </div>
    </main>

  </body>
</html>
