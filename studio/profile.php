<?php
function login($conn)
{
    echo "logged in";
    header("location:index.php");
}

if(isset($_GET['login']))
{
    ?>
    <form class="center w50 ma" action="" method="post">
        <div>Log In</div>
        <input class="bnone br25 h5 m10 center" type="text" name="name" id="" placeholder="Name"> <br>
        <input class="bnone br25 h5 m10 center" type="password" name="password" id="" placeholder="Password"> <br>
        <input class="bnone br25 h5" type="reset" value="Reset">
        <input class="bnone br25 h5" type="submit" name="login" value="Log In"> <br>
        <a href="?signup">Sign Up?</a>

    </form>
    <?php
}
else if(isset($_GET['signup']))
{
    ?>
    <form class="center ma" action="" method="post">
        <div>Sign Up</div>
        <a href="?login">Log In?</a>
    </form>
    <?php
}

if(isset($_POST['login'])){login($conn);}
else if(isset($_POST['signup'])){signup();}

if(isset($_GET['logout'])){logout();}
?>