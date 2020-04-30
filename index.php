<?php
    include("config.php");
    session_start();

    if(isset($_SESSION['message'])) {
?>
       <h1 style="color: white; background-color: #ff9999;"><?php echo $_SESSION['message']; ?></h1>
<?php
    unset($_SESSION['message']);
    }
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION['eid'] = NULL;
      
        //get eid and password from post request
        $eid = mysqli_real_escape_string($db,$_POST['eid']);
        //$password = mysqli_real_escape_string($db,$_POST['password']); 
        
        //query Users table to check if user exists
        $res = "SELECT * FROM Resident WHERE EID = '$eid'/*  and userPassword = '$password' */";
        $ra = "SELECT * FROM Resident WHERE RA_EID = '$eid'";
        $dir = "SELECT * FROM Director WHERE Dir_eid = '$eid'";

        $res_result = mysqli_query($db, $res);
        $ra_result = mysqli_query($db, $ra);
        $dir_result = mysqli_query($db, $dir);

        $row = mysqli_fetch_array($res_result,MYSQLI_ASSOC);
        $fName = $row['fname'];
        $eid = $row['EID'];
      
        $res_count = mysqli_num_rows($res_result);
        $ra_count = mysqli_num_rows($ra_result);
        $dir_count = mysqli_num_rows($dir_result);
       
        //if user exists
        if($dir_count == 1) 
        {
            //set session variables
            $_SESSION['role'] = "Director";
            $_SESSION['fname'] = $fName;
            $_SESSION['eid'] = $eid;            
         
            //redirect to home
            header("Location: home.php");
        }
        elseif($ra_count > 0){
            //set session variables
            $_SESSION['role'] = "RA";
            $_SESSION['fname'] = $fName;
            $_SESSION['eid'] = $eid;            
         
            //redirect to dashboard
            header("Location: home.php");
        }
        elseif ($res_count) {
            //set session variables
            $_SESSION['role'] = "Resident";
            $_SESSION['fname'] = $fName;
            $_SESSION['eid'] = $eid;            
         
            //redirect to dashboard
            header("Location: home.php");
        }
        else 
        {       
            $_SESSION['message'] = 'Invalid EID';
            
            //redirect to index page
            header("Location: index.php");
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
          <a href="home.php" style=""><strong>Student Housing Portal</strong></a>
        </li>
      </ul>
    </nav>

    <main>
      <div id="login-container">
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
