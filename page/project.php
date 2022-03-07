<h1>Projects</h1>

<?php
$project = mysqli_query($conn, "SELECT * FROM project");
if(mysqli_num_rows($project)>0)
{
    ?><table class="project"><?php
    while($row = mysqli_fetch_assoc($project))
    {
    ?>
    <tr>
        <td class="project-right">
            <h2><?php echo $row['projecttitle'];?></h2>
            <h3 style="color:#A0A0A0;"><?php echo $row['projectdes'];?></h3>
        </td>
        <td class="project-left">
            <h3>
                <a href="<?php echo $row['projectlink'];?>">
                    <i class='fa fa-github'> Fork this?</i>
                </a>
            </h3>
        </td>
    </tr>
    <?php
    }
    ?></table><?php
}
?>


