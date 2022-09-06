<?php
$home = $_GET['home'];
if($home==0)
{
    ?>
    <h2 class="link">Home</h2>

    <h3 class="link celtic-blue-bg"><a href="index.php?home=s">Software</a></h3>
    <h3 class="link celtic-blue-bg"><a href="index.php?home=w">Website</a></h3>
    <h3 class="link celtic-blue-bg"><a href="index.php?home=a">Affiliate</a></h3>
    <h3 class="link celtic-blue-bg"><a href="index.php?home=m">Social Media</a></h3>
    <h3 class="link celtic-blue-bg"><a href="index.php?home=g">Gadget</a></h3>
    <h3 class="link celtic-blue-bg"><a href="index.php?home=i">Advertisement</a></h3>
    <?php
}
else
{
    if($home == 's')
    {
        $title = "Software";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 's'");
    }
    else if ($home == 'w')
    {
        $title = "Website";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 'w'");
    }
    else if ($home == 'a')
    {
        $title = "Affiliate";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 'a'");
    }
    else if ($home == 'm')
    {
        $title = "Social Media";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 'm'");
    }
    else if ($home == 'g')
    {
        $title = "Gadget";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 'g'");
    }
    else if ($home == 'i')
    {
        $title = "Advertisement";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 'i'");
    }
    else if ($home == 'g')
    {
        $title = "Gadget";
        $q = mysqli_query($conn,"SELECT * FROM link WHERE tag LIKE 'g'");
    }
    else
    {
        ?><script>alert('Page Not Exist');</script><?php
        header('location:index.php?home=0');
    }

    ?>
    <h2 class=""><a href="index.php?home=0">Back</a></h2>
    <h2 class="link"><?php echo $title;?></h2>
    <?php
    if(mysqli_num_rows($q)>0)
    {
        while($q_a = mysqli_fetch_assoc($q))
        {
            ?>
            <h3 class="link persian-green-bg">
                <a target="_blank" href="<?php echo $q_a['link'];?>"><?php echo $q_a['name'];?></a>
            </h3>
            <?php
        }
    }

}