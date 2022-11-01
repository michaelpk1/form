<?php
ini_set('error_reporting',E_ALL);
ini_set('display_error',1);

include('config.php');
 $email = $pass = '';

 if(isset($_POST['btnlogin'])){
    $email = $_POST['userDetails'];
    $pwd = $_POST['userpwd'];
    

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) < 1){
        echo "incorrect details";
    } elseif (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $pass = $row['password'];
            // echo "hello";
            // exit(print_r($pass));

        }
        // dehash password and compare
        $vp = password_verify($pwd,$pass);
        if(!$vp){
            echo "incorrect password";
        } else {
            header('location: index.html');
        }
    }
 }


 if(isset($_POST['btnlogins'])){
    $email = $_POST['userDetail'];
    $pwd = $_POST['userpwds'];
    $hid = $_POST['userhidden'];

    

    $query = "SELECT * FROM users WHERE email = '$email' AND `No`='$hid'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) < 1){
        echo "incorrect details";
    } elseif (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $pass = $row['password'];

        }
        // dehash password and compare
        $vp = password_verify($pwd,$pass);
        if(!$vp){
            echo "incorrect password";
        } else {
            header('location: edit.php');
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
<div class="containter-bar">
<div>
        <h1 class="h1">Login</h1>
    </div>
         <?php
            if (isset($_GET['action'])){
                $userid = $_GET['action'];
                $query = " SELECT * FROM users WHERE `No` = '$userid'";
                $result = mysqli_query($conn,$query);
    
                while($row = mysqli_fetch_assoc($result)){

        ?>
                    <h2>we want to be sure it is you</h2>
                    <form action="login.php" method ="POST">
                        <div>
                            <input type="text" placeholder="email" name="userDetail" id="" class="input-page1">
                        </div>
                        <div>
                            <input type="hidden" placeholder="email" name="userhidden" id="" class="input-page1" value="<?php echo $row['No'] ?>">
                        </div>
                        <div>
                            <input type="password"  placeholder="Password" name="userpwds" id="" class="input-page1">
                        </div>
                        <div>
                            <input type="submit" name="btnlogins" value="login" id="" class="button">
                        </div>
                        <div>
                            <h3> Not registerd yet? <a href="signup.php">sign up</a></h3>
                        </div>
                    </form>

        <?php
                }
            } else{
        ?>
                    <form action="login.php" method ="POST">
                        <div>
                            <input type="text" placeholder="email" name="userDetails" id="" class="input-page1">
                        </div>
                        <div>
                            <input type="password"  placeholder="Password" name="userpwd" id="" class="input-page1">
                        </div>
                        <div>
                            <input type="submit" name="btnlogin" value="login" id="" class="button">
                        </div>
                        <div>
                            <h3> Not registerd yet? <a href="signup.php">sign up</a></h3>
                        </div>
                    </form>
        <?php
            }
        ?>
</div>
</body>
</html>