<h1 class='main'>Projects</h1>

<?php
$project = mysqli_query($conn, "SELECT * FROM project");
if(mysqli_num_rows($project)>0)
{
    ?><div style="display:flex;"><?php
    while($row = mysqli_fetch_assoc($project))
    {
    ?>
    <div style="width:50%; text-align:center;">
        <h2><?php echo $row['projecttitle'];?></h2>
        <code><?php echo $row['projectdes'];?></code>
        <h4>
            <a href="<?php echo $row['projectlink'];?>">
                <i class='fa fa-github'> Fork this?</i>
            </a>
        </h4>
    </div>
    <?php
    }
    ?></div><?php
    
}
?>


