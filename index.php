<?php include 'config.php';?>
<?php
session_start();
include("function.php");

if(isset($_SESSION['user_id']))
{
    $user_data = checkLogin($conn);
    ?><script>console.log(<?php echo $_SESSION['user_id'];?>);</script><?php
}
?>
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
<body class="bg-white-smoke">
<div>
    <?php include "static/includes/nav.php";?>
    <br>
    <table class="w80 ma">
        <?php
        $text = array();
        $link = array();
        $content = array();
        $target = "";
        if(!empty($_GET))
        {
            $back = "index.php";
            if(isset($_GET['project']))
            {
                if(empty($_GET['project']))
                {
                    $title = "Project";
                    $q = mysqli_query($conn,"SELECT * FROM project WHERE isShow=1");
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        array_push($text,$q_a['name']);
                        array_push($link,"index.php?project=".$q_a['id']);
                    }
                }
                else
                {
                    $back = "index.php?project";
                    $q = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM project WHERE id = '".$_GET['project']."' AND isShow =1 limit 1"));
                    $title = $q['name'];
                    $start = explode('-',$q['start'])[0];
                    $end = explode('-',$q['end'])[0];
                    if($end >  date("Y"))
                    {
                        $end = "Now";
                    }
                    array_push($content,$start." - ".$end);
                    array_push($content,$q['desc']);
                    array_push($content,"<a target='_blank' href='".$q['link']."'>Visit</a>");
                    //array_push()

                }
            }
            else if(isset($_GET['gallery']))
            {
                if(empty($_GET['gallery']))
                {
                    $title = "Album";
                    $q = mysqli_query($conn,"SELECT * FROM album WHERE isShow=1");
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        array_push($text,$q_a['name']);
                        array_push($link,"index.php?gallery=".$q_a['id']);
                    }
                }
                else
                {//!next
                    $back = "index.php?gallery";
                    $q = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM album WHERE isShow=1"));
                    $title = $q['name'];
                }
            }
            else if(isset($_GET['link']))
            {
                if(empty($_GET['link']))
                {
                    $title = "Link";
                    $q = mysqli_query($conn,"SELECT DISTINCT tag,tagname from link");
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        array_push($text,$q_a['tagname']);
                        array_push($link,"index.php?link=".$q_a['tag']);
                    }
                }
                else
                {
                    $back = "index.php?link";
                    $target = "target='_blank'";
                    $q = mysqli_query($conn,"SELECT * FROM link WHERE tag='".$_GET['link']."'");
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        $title = $q_a['tagname'];
                        array_push($text,$q_a['name']);
                        array_push($link,$q_a['link']);
                    }
                }

            }
            ?>
            <tr><td><h4 class="fg-cadmium-red"><a href="<?php echo $back;?>">Back</a></h4></td></tr>
            <tr><td><h1 class="center w100"><?php echo $title;?></h1></td></tr>
            <?php
        }
        else
        {
            array_push($content,"<h2 class='center'>Darwish Mat Zain</h2>");
            $q = mysqli_query($conn,"SELECT * FROM home WHERE tag='e' AND isShow = 1");
            array_push($content,"<h2 class='center'>Expertise</h2>");
            while($q_a = mysqli_fetch_assoc($q))
            {
                //$title = $q_a['tagname'];
                array_push($content,"<h3>".$q_a['name'])."</h3>";
                array_push($content,"<img class='w50 ma' src='images/expertise/".$q_a['file']."' alt=''>");
            }
        }

        if(!empty($link))
        {
            for($i=0;$i<count($text);$i++)
            {
                ?>
                <tr><td class="center"><h2><a <?php echo $target;?> href='<?php echo $link[$i];?>' class="w100 fg-celtic-blue"><?php echo $text[$i];?></a></h2></td></tr>
                <?php
            }
        }
        else if(!empty($content))
        {
            foreach($content as $c)
            {
                ?><tr><td><?php echo $c?></td></tr><?php
            }
        }
        ?>
    </table>
    <br>
    <?php //include 'static/includes/footer.php'?>
</div>
</body>
</html>