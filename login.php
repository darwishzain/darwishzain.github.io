<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "jelimy-3139374d2f";

//$dbhost = "sdb-o.hosting.stackcp.net";
//$dbuser = "developer-9be9";
//$dbpwd = "th3p@ssword!sth3p@ssword";
//$dbname = "jelimy-3139374d2f";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname))
{
    die("Failed to Connect");
}
function checkLogin($conn)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1 ";

        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //header("location:home.php");
    die;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password))
    {
        $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("location:index.php");
                    die;
                }
            }
        }
    }
    else
    {
        echo "Enter valid Info";
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
        <form class="form-login" method="post" action="">
            <div class="form-title">Log Masuk</div>
            <label class="form-label" for="user_name">Username</label> <br><br>
            <input class="form-text" type="text" name="user_name"> <br><br>
            <label class="form-label" for="password">Password</label> <br><br>
            <input class="form-text" type="password" name="password"><br><br>
            <input class="form-submit" type="submit" value="Log Masuk"><br><br>

            <a href="signup.php">Klik untuk Daftar</a><br><br>
        </form>
    </div>
</body>
</html>