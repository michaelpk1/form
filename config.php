<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

$conn = mysqli_connect("localhost", "root", "", "customer");
if(!$conn){
    die("Error".mysqli_error($conn));
} else {
    // echo "connected!";
}

// $host = "localhost";
// $username= "root";
// $psw = "";
// $db_name = "crud"


// $conn = mysli_connect($host,$username,$psw,$db_name)


?>
