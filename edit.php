
<?php 
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors',1);

  include('config.php');


  if(isset($_POST['btnupdate'])){
      $user= $_POST['userid'];
      $fn = $_POST['txtfn'];
      $ln = $_POST['txtln'];
      $un = $_POST['txtun'];
      $email = $_POST['txtemail'];
      $pwd = $_POST['pwd'];
      $con_pwd = $_POST['con_pwd'];
      $gender = $_POST['gender'];

    //   echo " <pre>";
    //   exit(print_r($_POST));
    //   echo " </pre>";
        if($pwd != $con_pwd){
            echo "passed do not match";
        }  else{

            
                $hasedwpd =password_hash($pwd,PASSWORD_DEFAULT);
            

            $upquery =  "UPDATE users SET firstname='$fn', 
                                lastname='$ln',username='$un', email='$email', gender='$gender', `password`='$hasedwpd' WHERE `No` = $user";
            $upresult = mysqli_query($conn,$upquery);
            if(!$upresult){
                die(mysqli_error($conn));
            } else {
                header('location: index.php');
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
    <?php
        if (isset($_GET['action'])){
            $userid = $_GET['action'];
            $query = " SELECT * FROM users WHERE `No` = '$userid'";
            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_assoc($result)){
0 
            
            // $id = $row['No'];
                // echo $row['username'];

            //   echo "<pre>";
            //   exit(print_r($row));
            //   echo "</pre>";
            // }  

         
    ?>

    <form action="edit.php" method="POST">
        <input type="hidden" placeholder="Id" name="userid" value="<?php echo $userid ?>" id="" class="input-page">
        <input type="text" placeholder="Name" name="txtfn" value="<?php echo $row['firstname'] ?>" id=""class="input-page">
        <input type="text" placeholder="LastName" name="txtln" value="<?php echo $row['lastname'] ?>" id=""class="input-page">
        <input type="text" placeholder="UserName" name="txtun" value="<?php echo $row['username'] ?>" id=""class="input-page">
        <input type="email" placeholder="Email" name="txtemail" value="<?php echo $row['email'] ?>" id="" class="input-page">
        <input type="password" placeholder="Password" name="pwd" value="<?php echo $row['email'] ?>" id=""class="input-page">
        <input type="password" placeholder="Confirm password" name="con_pwd" value="<?php echo $row['email'] ?>" id=""class="input-page">


        <select name="gender" id=""class="input-page">
            <option value="">CHOOSE GENDER</option>
            <option value="male">MALE</option>
            <option value="female">FEMALE</option>

        </select>
        <input type="submit" name="btnupdate"  value="UpDate" id=""class="button">

    </form>
    <?php
       }
    }
    ?>
</body>
</html>