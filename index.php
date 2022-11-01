<?php
 ini_set('error_reporting', E_ALL);
 ini_set('display_errors',1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      
    </style>
    <title>Document</title>
    <link rel="stylesheet" href="bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <table>
        <tr>
            <th>SN</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>Email</th>
            <th>password</th>
        </tr>
        <?php
            $sn = 0;
            include('config.php');
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn,$query);
            while ($row = mysqli_fetch_assoc($result)){
            
            $sn++;

        ?>
        <tr>
            <td><?php echo $sn?></td>
            <td><?php echo $row ['firstname'] ?></td>
            <td><?php echo $row ['lastname'] ?></td>
            <td><?php echo $row ['username'] ?></td>
            <td><?php echo $row ['email'] ?></td>
            <td><?php echo $row ['password'] ?></td>

            <td>
                <a href="login.php?action=<?php echo $row ['No'] ?>">Edit</a>
                <a href="delete.php?delete=<?php echo $row ['No'] ?>">Delete</a>

            </td>
        </tr>

        <?php
        }
        ?>
    </table>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>