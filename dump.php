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
                    ?>
                    <tr><td><h3><?php echo $start." - ".$end?></h3></td></tr>
                    <?php
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
            $q = mysqli_query($conn,"SELECT * FROM home WHERE tag='e' AND isShow = 1");
            ?><h2 class="w100 ma center">Darwish Mat Zain</h2><?php
            while($q_a = mysqli_fetch_assoc($q))
            {
                ?>
                <tr><td><h3 class="w100 ma center"><?php echo $q_a['name'];?></h3></td></tr>
                <tr><td><img class='w100 ma center' src='images/expertise/<?php echo $q_a['file'];?>' alt=''></td></tr>
                <?php
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