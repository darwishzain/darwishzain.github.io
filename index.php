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
    <link rel='icon' href='images/darwishzainstd.png'>
    <title>Darwish Zain</title>
    <link rel="stylesheet" href="static/styles/main.css?ver=<?php echo rand(111,9999);?>">
</head>
<body>
    <div class="">
        <?php include "static/includes/nav.php";?>
        <table class="w80 ma bg-white-smoke">
        <?php
            if(!empty($_GET))
            {
                if(isset($_GET['project']))
                {
                    if(empty($_GET['project']))
                    {
                        ?>
                        <tr><td><h4 class="fg-cadmium-red"><a href="index.php">Back</a></h4></td></tr>
                        <tr><td><h1 class="center fg-persian-green">Projects</h1></td></tr>
                        <?php
                        $q = mysqli_query($conn,"SELECT id,name FROM project WHERE isShow = 1");
                        if(!empty(mysqli_num_rows($q)))
                        {
                            while($q_a = mysqli_fetch_assoc($q))
                            {
                                ?>
                                <tr>
                                    <td>
                                    <a class="center" href="index.php?project=<?php echo $q_a['id'];?>">
                                        <h2 class="bg-celtic-blue fg-white-smoke br25 w50 ma"><?php echo $q_a['name'];?></h2>
                                    </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    else
                    {
                        $q = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM project WHERE id = '".$_GET['project']."' AND isShow =1 limit 1"));
                        $start = explode('-',$q['start'])[0];
                        $end = explode('-',$q['end'])[0];
                        if($end >  date("Y")){$end = "Now";}
                        ?>
                        <tr><td><h4 class="fg-cadmium-red"><a href="index.php?project">Back</a></h4></td></tr>
                        <tr><td><h1 class="center fg-persian-green"><?php echo $q['name'];?></h1></td></tr>
                        <tr><td><h3>(<?php echo $start." - ".$end;?>)</h3></td></tr>
                        <tr><td><h3><?php echo $q['desc'];?><br></h3></td></tr>
                        <tr>
                            <td>
                                <?php
                                if(!empty($q['visit']))
                                {
                                    ?>
                                    <a target="_blank" class="fg-celtic-blue" href="<?php echo $q['link'];?>">Visit</a>
                                    <?php
                                }
                                if(!empty($q['code']))
                                {
                                    ?>
                                    <a target="_blank" class="fg-celtic-blue" href="<?php echo $q['code'];?>">
                                    Source Code
                                    </a>
                                    <?php
                                }
                                if(!empty($q['download']))
                                {
                                    ?>
                                    <a target="_blank" class="fg-celtic-blue" href="<?php echo $q['download'];?>">Download</a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        if(!$q)
                        {
                            ?><script>alert('Project Not Exist')</script><?php
                            header('location:index.php?project=0');
                        }
                    }
                }
                else if(isset($_GET['link']))
                {
                    $home = array("s"=>"Software","w"=>"Website","a"=>"Affiliate","m"=>"Social Media","g"=>"Gadget","i"=>"Advertisement");
                    if(empty($_GET['link']))
                    {
                        ?>
                        <tr><td><h4 class="fg-cadmium-red"><a href="index.php">Back</a></h4></td></tr>
                        <tr><td><h1 class="center fg-persian-green">Link</h1></td></tr>
                        <?php
                        $q = mysqli_query($conn,"SELECT DISTINCT tag,tagname from link");
                        while($q_a = mysqli_fetch_assoc($q))
                        {
                            ?>
                            <tr>
                                <td class="center">
                                    <a  href="index.php?link=<?php echo $q_a['tag'];?>">
                                    <h2 class="bg-celtic-blue fg-white-smoke br25 w50 ma"><?php echo $q_a['tagname'];?></h2>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <i class="fa fa-github"><a href="https://github.com/darwishzain"></a></i>
                        <?php
                    }
                    else
                    {
                        ?>
                            <tr><td><h4 class="fg-cadmium-red"><a href="index.php?link">Back</a></h4></td></tr>
                            <?php
                            $q = mysqli_query($conn,"SELECT * FROM link WHERE tag='".$_GET['link']."'");
                            $t = mysqli_fetch_assoc(mysqli_query($conn,"SELECT tagname from link WHERE tag='".$_GET['link']."' LIMIT 1"));
                            ?><tr><td><h1 class="center fg-celtic-blue"><?php echo $t['tagname'];?></h1></td></tr>
                            <?php
                            while($q_a=mysqli_fetch_assoc($q))
                            {
                                ?>
                                <tr>
                                    <td class="center">
                                        <a target="_blank" href="<?php echo $q_a['link'];?>">
                                            <h3 class="bg-persian-green fg-white-smoke br25 w50 ma"><?php echo $q_a['name'];?></h3>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                    }
                }
            }
            else
            {
                ?>
                <tr><td class="center"><h1>Hi!</h1></td></tr>
                <tr><td class="center"><img class="w50" src="images/1.jpg" alt="" srcset=""></td></tr>
                <tr><td class="center"><h2 class="w50 ma">My name is Darwish Mat Zain</h2></td></tr>
                <tr><td class="center"><img class="w50" src="images/2.jpg" alt="" srcset=""></td></tr>
                <tr><td class="center"><h2 class="w50 ma">I am a student at University of Malaysia Pahang</h2></td></tr>
                <tr><td class="center"><img class="w50" src="images/3.jpg" alt="" srcset=""></td></tr>
                <tr><td class="center"><h2 class="w50 ma">I am studying Computer Science in Software Engineering</h2></td></tr>
                <tr><td class="center"><img class='w50' src='images/4.jpg' alt=''></td></tr>
                <tr><td class="center"><h2 class="w50 ma">I am a Photographer "Say Cheese",</h2></td></tr>
                <tr><td class="center"><img class='w50' src='images/5.jpg' alt=''></td></tr>
                <tr><td class="center"><h2 class="w50 ma">a Programmer "If it works don't touch it",</h2></td></tr>
                <tr><td class="center"><img class='w50' src='images/6.jpg' alt=''></td></tr>
                <tr><td class="center"><h2 class="w50 ma">and a Grapic Designer "All I do is clicking here and there",</h2></td></tr>
                <tr><td class="center"><img class='w50' src='images/7.jpg' alt=''></td></tr>
                <tr><td class="center"><h2 class="w50 ma">*whisper* a Youtuber "I'm trying to"</h2></td></tr>
                <tr><td class="center"><img class="w50" src="images/8.jpg" alt="" srcset=""></td></tr>
                <tr><td class="center"><h2 class="w50 ma">Then there's this guy</h2></td></tr>
                <tr><td class="center"><h2 class="w50 ma">Don't blame him. He's just born like this. A goose</h2></td></tr>
                <?php
            }
            ?>
        </table>
        <?php include 'static/includes/footer.php';?>
    </div>
</body>
</html>