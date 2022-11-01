 <?php
 // it help to check errors
 ini_set('error_reporting', E_ALL);
 ini_set('display_errors',1);

 include("config.php");

 if(isset($_POST['btnsignup'])){
    $firstname = $_POST['txtf'];
    $lastname = $_POST['txtl'];
    $username = $_POST['txtu'];
    $email = $_POST['txte'];
    $pwd = $_POST['txtp'];
    $con_pwd = $_POST['txtc'];

    if($pwd !=)
    if($pwd != $con_pwd){
        echo "password do not match";
    } else {
        $hasedwpd = password_hash($pwd,PASSWORD_DEFAULT);

        $query = "INSERT INTO users(firstname,lastname,username,email, `password`) 
                                   VALUE('$firstname','$lastname','$username','$email', '$hasedwpd')";
        $result = mysqli_query($conn,$query);
        if (!$result){
            die("ERROR:".mysqli_error($conn));
        } else {
            header('location: login.php');
        }
    }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body class="red">
    <form action="signup.php" method="POST">
    <div>
        <h1>Register</h1>
    </div>
        <div class="form-bar">
            <input type="text" name="txtf" placeholder="FirstName" id="" class="input-page">
        </div>
        <div class="form-bar">
            <input type="text" name="txtl" placeholder="LastName" id="" class="input-page">
        </div>
        <div class="form-bar">
            <input type="" name="txtu" placeholder="Username" id="" class="input-page">
        </div>
        <div class="form-bar">
            <input type="text" name="txte" placeholder="Email" id="" class="input-page">
        </div>
        <div class="form-bar">
            <input type="password" name="txtp" placeholder="Password" id=""class="input-page">
        </div>
        <div class="form-bar">
            <input type="password" name="txtc" placeholder="Confirm password" id="" class="input-page">
        </div>
        <div class="form-bar">
            
            <input type="submit" name="btnsignup" value="submit" id=""  class="button">
        </div>
        <div>
                <h3>Already Have Account? <a href="login.php">sing in</a></h3>
        </div>
    </form>
</body>
</html>