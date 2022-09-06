<?php include_once "./static/includes/config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&#128279;</title>
    <link rel="stylesheet" href="./static/styles/link.css">
    <link rel='icon' href='./static/image/dzslogo.png'>
    <base target="_blank" href="">
	<script src="https://kit.fontawesome.com/6d1cef488a.js" crossorigin="anonymous"></script>
</head>
<body>
<a style="float: left;" href="./index.php" target="_self">
    <i class="fa fa-home"></i>
</a>
<br>
<img class="profile" src="./static/image/darwish-left.png" alt="">
<h3>Darwish Mat Zain</h3><br><br>
<?php
    $link = mysqli_query($conn, "SELECT * FROM link");
    if(mysqli_num_rows($link)>0)
    {
        while($row = mysqli_fetch_assoc($link))
        {
            ?>
            <a target='_blank'
                href='<?php echo $row['linklink']?>' target='_self'>
                <p class='link'><?php echo $row['linkname'];?></p>
            </a>
            <br>
            <?php
        }
    }
?>
<div>
<?php
    $social = mysqli_query($conn, "SELECT * FROM social");
    if(mysqli_num_rows($social)>0)
    {
        while($row = mysqli_fetch_assoc($social))
        {
            ?>
            <a href='<?php echo $row['sociallink'];?>'>
                <i class='<?php echo $row['socialfa'];?>'></i>
            </a>
            <?php
        }
    }
?>
</div>


<footer>
    <?php include "./static/includes/copy.php";?>
</footer>
</body>
<!--onerror="this.onerror=null; this.src='Default.jpg'"-->
</html>
<!--
    <div>
    <a href="https://click.accesstra.de/adv.php?rk=004n8v000rs9" target="_blank"><img src="https://imp.accesstra.de/static/image.php?rk=004n8v000rs9" border="0"/></a>
    <br>
    <a href="https://click.accesstra.de/adv.php?rk=004hf1000rs9" target="_blank"><img src="https://imp.accesstra.de/static/image.php?rk=004hf1000rs9" border="0"/></a>
    <br>
    <a href="https://click.accesstra.de/adv.php?rk=004tx6000rs9" target="_blank"><img src="https://imp.accesstra.de/static/image.php?rk=004tx6000rs9" border="0"/></a>
    <br>
    <a href="https://click.accesstra.de/adv.php?rk=001in5000rs9" target="_blank"><img src="https://imp.accesstra.de/static/image.php?rk=001in5000rs9" border="0"/></a>
    <br>
    <a href="https://click.accesstra.de/adv.php?rk=005eip000rs9" target="_blank"><img src="https://imp.accesstra.de/static/image.php?rk=005eip000rs9" border="0"/></a>
</div>
-->