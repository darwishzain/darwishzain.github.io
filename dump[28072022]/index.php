<?php
//* Connect to database
include_once "./static/includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./static/includes/head.php";?>
</head>
<body>
    <!--header-->
	<?php include "./static/includes/header.php";?>
    <?php include "./static/includes/nav.php";?>
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
	<?php include "./static/includes/footer.php";?>
</body>
</html>
