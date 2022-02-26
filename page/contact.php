
<h1 >Contact</h1>
<?php
$contact = mysqli_query($conn, "SELECT * FROM contact");
if(mysqli_num_rows($contact)>0)
{
    while($row = mysqli_fetch_assoc($contact))
    {
        ?>
        <div style="display:flex;">
            <div style="width:40%">
                <img class="profile" style="width:200px;height:200px;" src="./static/image/darwish-left.png" alt="">
            </div>
            <div style="width:50%;text-align:left;">
                <h3 class=''><?php echo $row['contactname'];?></h3><br>
                <h3 class=''><?php echo $row['contactaddress'];?></h3><br>
                <h3 class=''>
                    <a href='tel:<?php echo $row['contactphone'];?>'>
                        Work(<?php echo $row['contactphone'];?>)
                    </a>
                    <a href='tel:<?php echo $row['contactphome'];?>'>
                        Mobile(<?php echo $row['contactphome'];?>)
                    </a>
                </h3>
                <h3 class=''>
                    <a href='mailto:<?php echo $row['contactemail'];?>'>
                        E-Mail(<?php echo $row['contactemail'];?>)
                    </a>
                </h3><br>
            </div>
    </div>
        <?php
    }
}
