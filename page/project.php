<h1 class='main'>Projects</h1>

<?php
$project = mysqli_query($conn, "SELECT * FROM project");
if(mysqli_num_rows($project)>0)
{
    while($row = mysqli_fetch_assoc($project))
    {
    echo "
        <span>
            <h2 class='sub'>".$row['projecttitle']."</h2>
            <span>
                <h3 class='sub'>Description:</h3>
                <h4>".$row['projectdes']."</h4>
            </span>
            <h4><a href='".$row['projectlink']."' target='_self'><i class='fa fa-github'></i>[Github]</a></h4>
        </span>
        ";
    }
}
?>
