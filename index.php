<?php
//* Connect to database
include_once "./include/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Darwish Mat Zain</title>
    <?php include "./include/head.php";?>
</head>
<body>
    <!--header-->
	<header><?php include "./include/header.php";?></header>
    <nav><?php include "./include/nav.php";?></nav>
    <!--content-->
    <span class="content">
        <?php
        if(isset($_GET['project']))
        {include "./page/project.php";}
        else if(isset($_GET['contact']))
        {include "./page/contact.php";}
        else if(isset($_GET['about']))
        {include "./page/about.php";}
        else if(isset($_GET['home']))
        {include "./page/home.php";}
        else
        {include "./page/home.php";;}
        ?>
    </span>
    <!--footer-->
	<footer><?php include "./include/footer.php";?></footer>

	<?php include "./include/copy.php";?>
</body>
</html>
