<?php

echo "<h1 class='main'>Projects by Darwish Zain</h1>";
$project = mysqli_query($conn, "SELECT * FROM project");
if(mysqli_num_rows($project)>0)
{
    while($row = mysqli_fetch_assoc($project))
    {
    echo "
        <span>
            <h2 class='main'>".$row['projecttitle']."</h2>
            <span>
                <h3 class='main'>Description:</h3>
                <h4 class='sub'>".$row['projectdes']."</h4>
            </span>
            <h4><a href='".$row['projectlink']."' target='_self'>[link]</a></h4>
        </span>
        ";
    }
}