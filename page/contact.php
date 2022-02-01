<?php
echo "<h1>Contact</h1>";
$contact = mysqli_query($conn, "SELECT * FROM contact");
if(mysqli_num_rows($contact)>0)
{
    while($row = mysqli_fetch_assoc($contact))
    {
    echo "
        <span>
            <h2 class='main'>Real Name</h2>
            <h3 class='sub'>".$row['contactname']."</h3><br>
            <h2 class='main'>Address</h2>
            <h3 class='sub'>".$row['contactaddress']."</h3><br>
            <h2 class='main'>Work</h2>
            <h3 class='sub'><a href='tel:".$row['contactphone']."'>".$row['contactphone']."</a></h3><br>
            <h2 class='main'>Mobile</h2>
            <h3 class='sub'><a href='tel:".$row['contactphome']."'>".$row['contactphome']."</a></h3><br>
            <h2 class='main'>Email</h2>
            <h3 class='sub'><a href='mailto:".$row['contactemail']."'>".$row['contactemail']."</a></h3><br>
        </span>
        ";
    }
}
