<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form method="POST">
        <input name="user" type="text"><br>
        <input name="password" type="text"><br>
        <button>Login</button>
   </form>

    <?php 
        if($_POST){
            $user = $_POST['user'];
            $pass = $_POST['password'];

            if($user == ""){
                echo "User is not set";
            }

            echo $user;
            echo "<br>";

            echo $pass;
            echo "<br>";
        }
    ?>
</body>
</html>