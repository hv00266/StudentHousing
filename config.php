<?php
   define('DB_SERVER', 'studenthousing.c7rshjiq9wud.us-east-1.rds.amazonaws.com:3306');
   define('DB_USERNAME', 'admin');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'studenthousing');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>