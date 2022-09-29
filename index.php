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
<body class="bg-black">
<div>
    <?php include "static/includes/nav.php";?>
    <br>
    <div class="h100 w80 ma br25 bg-white-smoke">
        <?php
        if(isset($_GET['project']))
        {
            if($_GET['project'] == 0)
            {
                ?>
                <table class="w80 ma">
                    <tr><td><h2 class=""><a href="index.php">Back</a></h2></td></tr>
                    <tr><td><h2 class="link">Project</h2></td></tr>
                    <?php
                    $q = mysqli_query($conn,"SELECT * FROM project WHERE isShow = 1");
                    if(mysqli_num_rows($q)>0)
                    {
                        while($q_a = mysqli_fetch_assoc($q))
                        {
                            ?>
                            <tr>
                                <td>
                                <a href="index.php?project=<?php echo $q_a['id'];?>">
                                    <h3 class="link bg-celtic-blue fg-white-smoke"><?php echo $q_a['pro_title'];?></h3>
                                </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <?php

            }
            else
            {
                $q = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM project WHERE id = '".$_GET['project']."' AND isShow =1 limit 1"));
                if(!$q)
                {
                    ?><script>alert('Project Not Exist')</script><?php
                    header('location:index.php?project=0');
                }
                $start = explode('-',$q['pro_start'])[0];
                $end = explode('-',$q['pro_end'])[0];
                if($end >  date("Y"))
                {
                    $end = "Now";
                }
                ?>
                <div>
                <h2 class="link"><?php echo $q['pro_title'];?></h2>
                    <h3>(<?php echo $start." - ".$end;?>)</h3>
                    <h3>
                        <?php echo $q['pro_desc'];?><br>
                    </h3>
                    <a target="_blank" href="<?php echo $q['pro_link'];?>">
                        Visit
                    </a>
                </div>
                <?php
            }
        }
        else if(isset($_GET['gallery']))
        {
            $gallery = $_GET['gallery'];
            if($gallery == 0)
            {
                //:] List all album
                $q = mysqli_query($conn,"SELECT * FROM album");
                ?>
                <h2 class="link">Gallery</h2>
                <?php
                if(mysqli_num_rows($q)>0)
                {
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        ?>
                        <h3 class="link bg-celtic-blue">
                            <a href="index.php?gallery=<?php echo $q_a['id']?>"><?php echo $q_a['name'];?></a>
                        </h3>
                        <?php
                    }
                }
            }
            else if($gallery == 'album')
            {
                //:] Add new album
                ?>
                <form name="" action="" method="post" style="text-align:center">
                    <h2 class="link">New Album</h2>
                    <input class="" type="text" name="album_name" placeholder="Name"> <br>
                    Date <input type="date" name="album_date" id="" value="<?php echo date('Y-m-d');?>"><br>
                    <input type="text" name="album_tag" placeholder="Tag"> <br>
                    <input type="text" name="album_by" placeholder="By"> <br>
                    <input type="submit" name="new" value="Add"><br>
                </form>
                <?php
                if(!empty(isset($_POST['new'])))
                {
                    $albumname = $_POST['album_name'];
                    $albumdate = $_POST['album_date'];
                    $albumtag = $_POST['album_tag'];
                    $albumby = $_POST['album_by'];

                    $query = "INSERT INTO album (name, date, tag, byline) VALUES ('$albumname', '$albumdate','$albumtag', '$albumby')";
                    $result = mysqli_query($conn, $query);
                    if($result)
                    {
                        echo "success";
                    }
                }
            }
            else if($gallery == 'gallery')
            {
                //:] Add new gallery
                $q = mysqli_query($conn,"SELECT id,name FROM album");
                if(mysqli_num_rows($q)>0)
                {
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        ?>
                        
                        <h3 class="link bg-celtic-blue">
                            <a href="index.php?gallery=<?php echo $q_a['id']?>"><?php echo $q_a['name'];?></a>
                        </h3>
                        <?php
                    }
                }
            }
            else
            {
                $q = mysqli_query($conn,"SELECT * FROM gallery WHERE album_id = '$gallery'");
                $r_a = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM album WHERE id = '$gallery'"));
                ?>
                <h2 class="link"><?php echo $r_a['name'];?></h2>
                <h3 class="link">by: <?php echo $r_a['byline'];?> (<?php echo $r_a['date'];?>)</h3>
                <?php
                if(mysqli_num_rows($q)>0)
                {
                    while($q_a = mysqli_fetch_assoc($q))
                    {
                        ?>
                        <img class="g_image" src="images/gallery/<?php echo $gallery;?>/<?php echo $q_a['name'];?>" alt="">
                        <?php
                    }
                }
            }
        }
        else if(isset($_GET['home']))
        {
            $home = array("s"=>"Software","w"=>"Website","a"=>"Affiliate","m"=>"Social Media","g"=>"Gadget","i"=>"Advertisement");
            if($_GET['home']==0)
            {
                ?>
                <table class="w80 ma">
                    <tr><td><h2 class=""><a href="index.php">Back</a></h2></td></tr>
                    <tr><td><h2 class="link">Home</h2></td></tr>
                <?php
                    foreach ($home as $link => $text) {
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?home=<?php echo $link?>&title=<?php echo $link?>">
                            <h3 class="link bg-celtic-blue fg-white-smoke"><?php echo $text?></h3>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <?php
            }
            else
            {
                ?>
                <table class="w80 ma">
                    <tr><td><h2 class=""><a href="index.php?home=0">Back</a></h2></td></tr>
                    <tr><td><h2 class="link"><?php echo $home[$_GET['title']];?></h2></td></tr>
                    <?php
                    $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE '".$_GET['home']."'");

                    if(mysqli_num_rows($q)>0)
                    {
                        while($q_a = mysqli_fetch_assoc($q))
                        {
                            ?>
                            <tr>
                                <td>
                                    <a target="_blank" href="<?php echo $q_a['link'];?>">
                                        <h3 class="link bg-persian-green fg-white-smoke"><?php echo $q_a['name'];?></h3>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <?php
            }
        }
        else
        {
            ?>
            <table class="w100 center ma br25 bg-white-smoke">
                <tr><td colspan="2"><h1 class="w100 center">Expertise</h1></td></tr>
                <?php
                $expertise = array("Photography","Software Development","Game Development","Web Developement","Digital Design", "Digital Art");
                for ($i=0; $i < count($expertise); $i++)
                {
                    ?>
                    <tr>
                        <td class="w50"><img class="w50" src="images/home/<?php echo $i?>.jpg" alt=""></td>
                    </tr>
                    <tr>
                        <td class="w50"><h3 class="w100"><?php echo $expertise[$i];?></h3></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <br>
            <table class="w100 center ma br25 bg-white-smoke">
                <tr><td><h1 class="w100 center">Programming Language</h1></td></tr>
                <?php
                $programming = array("Python", "C,C++,C#");
                foreach ($programming as $p) {
                    ?>
                    <tr>
                        <td class="w20">
                            <h3 class=""><?php echo $p;?></h3>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        }
        ?>
    </div>
    <br>
    <?php //include 'static/includes/footer.php'?>
</div>
</body>
</html>