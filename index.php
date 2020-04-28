<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        //get email and password from post request
        $eid = mysqli_real_escape_string($db,$_POST['eid']);
        //$password = mysqli_real_escape_string($db,$_POST['password']); 
        
        //query Users table to check if user exists
        $query = "SELECT * FROM Resident WHERE EID = '$eid'/*  and userPassword = '$password' */";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$fName = $row['fname'];
        //$eid = $row['EID'];
      
        $count = mysqli_num_rows($result);
       
        //if user exists
        if($count == 1) 
        {
            //set session variables
            //$_SESSION['fname'] = $fName;
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
