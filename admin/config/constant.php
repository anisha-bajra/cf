<?php 
    session_start();

	define('SITEURL','http://localhost/bandipurinn');

    define('DB_HOST','localhost');
    define('DB_USERNAME', 'root'); 
    define('DB_PASSWORD', ''); 
    define('DB_NAME', 'bandipurinn'); 
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());

    // database connection
    
    $db_select = mysqli_select_db($conn, DB_NAME ) or die(mysqli_error());

?>