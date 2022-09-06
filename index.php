<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='images/logo.png'>
    <title>Darwish Zain</title>
    <link rel="stylesheet" href="static/styles/main.css?ver=<?php echo rand(111,9999);?>">

</head>
<body>
<div id="container">
    <div id="content">
        <?php include "static/includes/nav.php";?>

        <?php
        if(isset($_GET['project']))
        {
            include 'project.php';
        }
        else if(isset($_GET['gallery']))
        {
            include 'gallery.php';
        }
        else if(isset($_GET['home']))
        {
            include 'home.php';
        }
        else
        {
            ?>
            <h1 class="link cadmium-red-bg">Under Development</h1>
            <div class="">
                <div class="">
                    Photography
                    <br>
                    Web Development
                </div>
                <div class="">
                    <img id="main-image" src="images/darwish.png" alt="" srcset="">
                </div>
                <div class="twentyfive">
                    Software Development
                    <br>
                    Digital Design
                </div>
            </div>
            <!--
                <a href="https://click.accesstra.de/adv.php?rk=007mv3000rs9&url=https%3A%2F%2Fshopee.com.my%2Fgadgetnations%3Futm_source%3Dan_12105460000%26utm_medium%3Daffiliates%26utm_campaign%3D-%26utm_content%3D%7Bpsn%7D-%7Bclickid%7D-%7Bpublisher_site_url%7D-%7Bcampaign%7D-%26af_siteid%3Dan_12105460000%26pid%3Daffiliates%26af_click_lookback%3D7d%26is_retargeting%3Dtrue%26af_reengagement_window%3D7d%26af_sub_siteid%3D%7Bpsn%7D-%7Bclickid%7D-%7Bpublisher_site_url%7D-%7Bcampaign%7D-%26c%3D-%26deep_and_deferred%3D1" target="_blank">
                    <img src="https://cf.shopee.com.my/file/e934cf617868ce659008992d0a3e80c0_tn" alt="Gadgetnation on Shopee" border="0"/><img src="https://imp.accesstra.de/img.php?rk=007mv3000rs9"width="1"height="1"border="0"alt=""/>
                </a>
            -->
            <?php
        }
        ?>
    </div>
    <footer>
        Copyright &copy; 2018-<script>document.write(new Date().getFullYear())</script>
        <a target="_blank" href="https://darwishzain.com">Darwish Zain Studio</a>
    </footer>
</div>
</body>
</html>