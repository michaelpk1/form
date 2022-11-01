<?php
ini_set('error_reporting',E_ALL);
ini_set('display_error',1);

include('config.php');

if(isset($_GET['delete'])){
    $userid = $_GET['delete'];
    $delquery = "DELETE FROM users WHERE `NO` = $userid";
    $delresult = mysqli_query($conn,$delquery);
    if(!$delresult){
        die(mysqli_error($conn));
    } else {
        header('location: index.php');
    }
}
?>