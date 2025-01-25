<?php
$contact = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM contact"));
$social = mysqli_query($conn, "SELECT * FROM social");
?>
<!--1st column-->
<footer>
<span class='foot'>
<h4 class='main'>Developed by</h4>
<img class="profile" src="./static/image/darwish-left.png" alt=""><br>

<!--<img src='./static/image/dzslogo.png' alt='developers logo' height='80px' alt='' srcset=''>-->
<p class="sub">
    <?php echo $contact['contactname']."<br>".$contact['contactaddress'];?>
</p>
<br>
</span>
<!--2nd column-->
<span class='foot'><h4 class='main'>Feedback</h4>
    <form action='email.php'>
        <input type='email' name='' id='' placeholder='E-mail' size='10'><br>
        <textarea name='' id='' cols='15' rows='5' placeholder='Message'></textarea><br>
        <input type='submit' value='Submit'><input type='reset' value='Reset'>
    </form>
</span>
<!--3rd column-->
<span class='foot'><h4 class='main'>Social</h4><ul>
<?php
if(mysqli_num_rows($social)>0)
{
    while($row = mysqli_fetch_assoc($social))
    {
    echo "
        <li><a href='".$row['sociallink']."' target='_blank'>
        <i class=' ".$row['socialfa']."'> ".$row['socialuser']."</i>
        </a>
        ";
    }
}
?>
</ul></span>
<!--4th column-->
<span class='foot'>
    Policy<br>
    Disclaimer <br>
</span>
</footer>
<?php include "./static/includes/copy.php";?>