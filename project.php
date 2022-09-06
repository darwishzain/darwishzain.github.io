<?php
$project = $_GET['project'];
if($project == 0)
{
    $q = mysqli_query($conn,"SELECT * FROM project WHERE isShow = 1");
    ?><h2 class="link">Project</h2><?php
    if(mysqli_num_rows($q)>0)
    {
        while($q_a = mysqli_fetch_assoc($q))
        {
            ?>
            <h3 class="link celtic-blue-bg">
                <a href="index.php?project=<?php echo $q_a['id'];?>"><?php echo $q_a['pro_title'];?></a>
            </h3>
            <?php
        }
    }
}
else
{
    $q = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM project WHERE id = $project AND isShow =1 limit 1"));
    if(!$q)
    {
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
    <h2 class=""><a href="index.php?project=0">Back</a></h2>
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
