
<h1 class="main">Contact</h1>
<?php
$contact = mysqli_query($conn, "SELECT * FROM contact");
if(mysqli_num_rows($contact)>0)
{
    while($row = mysqli_fetch_assoc($contact))
    {
    echo "
        <span>
            <h2 class='sub'>Name</h2>
            <h3 class=''>".$row['contactname']."</h3><br>
            <h2 class='sub'>Address</h2>
            <h3 class=''>".$row['contactaddress']."</h3><br>
            <h2 class='sub'>Work</h2>
            <h3 class=''><a href='tel:".$row['contactphone']."'>".$row['contactphone']."</a></h3><br>
            <h2 class='sub'>Mobile</h2>
            <h3 class=''><a href='tel:".$row['contactphome']."'>".$row['contactphome']."</a></h3><br>
            <h2 class='sub'>Email</h2>
            <h3 class=''><a href='mailto:".$row['contactemail']."'>".$row['contactemail']."</a></h3><br>
        </span>
        ";
    }
}
