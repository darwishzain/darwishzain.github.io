<?php
session_start();

include 'config.php';

function login($conn)
{
    if($_SERVER['REQUEST_METHOD']== 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password))
        {
            $loginr = mysqli_query($conn, "SELECT * FROM users WHERE name = '$username' limit 1");
            if($loginr)
            {
                if($loginr && mysqli_num_rows($loginr)>0)
                {
                    $logind = mysqli_fetch_assoc($loginr);
                    if($logind['password'] === $password)
                    {
                        $_SESSION['user_id'] = $logind['id'];
                        header("location:index.php");
                        die;
                    }
                }
            }
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
    <title>Log Masuk</title>
    <link rel="stylesheet" href="static/styles/main.css">

</head>
<body>
    <div>
        <a class="" href="index.php">Home</a>
        <?php
        if(isset($_GET['login']))
        {
            ?>
            <form class="center w50 ma bg-celtic-blue fg-white-smoke br25" method="post" action="profile.php">
                <div class="">Log Masuk</div>
                <label class="" for="username">Username</label> <br><br>
                <input class="" type="text" name="username"> <br><br>
                <label class="" for="password">Password</label> <br><br>
                <input class="" type="password" name="password"><br><br>
                <input class="bg-cadmium-red bnone br25" type="reset" value="Reset">
                <input class="bnone br25" type="submit" name="login" value="Log Masuk"><br><br>

                <a href="profile.php?signup">Klik untuk Daftar</a><br><br>
            </form>
            <?php
        }
        else if(isset($_GET['signup']))
        {
            echo 'Website not open for signup yet';
        }

        if(isset($_POST['login'])){login($conn);}else if(isset($_POST['signup'])){signup();}
        ?>
    </div>
</body>
</html>