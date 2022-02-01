<?php

$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contact"));

//? 1
echo "
    <span class='foot'><h4 class='main'>Developed by</h4>
    <img src='./img/dzslogo.png' alt='developers logo' height='80px' alt='' srcset=''> <br>
    ".$contact['contactname']."<br>".$contact['contactaddress']."<br>
    </span>
    ";
//? 2
echo "
    <span class='foot'><h4 class='main'>Feedback</h4>
    <form action='email.php'>
        <input type='email' name='' id='' placeholder='E-mail' size='10'><br>
        <textarea name='' id='' cols='15' rows='5' placeholder='Message'></textarea><br>
        <input type='submit' value='Submit'><input type='reset' value='Reset'>
    </form>
    </span>
    ";
//? 3
echo "
    <span class='foot'><h4 class='main'>Social</h4><ul>";
$social = mysqli_query($conn, "SELECT * FROM social");
if(mysqli_num_rows($social)>0)
{
    while($row = mysqli_fetch_assoc($social))
    {
    echo "
        <li><a href='".$row['sociallink']."' target='_blank'>
        <i class='".$row['socialfa']."'> ".$row['socialuser']."</i>
        </a>
        ";
    }
}       
echo "</ul></span>";
echo "<span class='foot'>Policy<br>Disclaimer <br></span>";
    