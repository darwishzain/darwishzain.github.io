<?php
$gallery = $_GET['gallery'];
if($gallery == 0)
{
    //:] List all album
    $q = mysqli_query($conn,"SELECT * FROM album");
    ?>
    <h2 class="link">Gallery</h2>
    <?php
    if(mysqli_num_rows($q)>0)
    {
        while($q_a = mysqli_fetch_assoc($q))
        {
            ?>
            <h3 class="link celtic-blue-bg">
                <a href="index.php?gallery=<?php echo $q_a['id']?>"><?php echo $q_a['name'];?></a>
            </h3>
            <?php
        }
    }
}
else if($gallery == 'album')
{
    //:] Add new album
    ?>
    <form name="" action="" method="post" style="text-align:center">
        <h2 class="link">New Album</h2>
        <input class="" type="text" name="album_name" placeholder="Name"> <br>
        Date <input type="date" name="album_date" id="" value="<?php echo date('Y-m-d');?>"><br>
        <input type="text" name="album_tag" placeholder="Tag"> <br>
        <input type="text" name="album_by" placeholder="By"> <br>
        <input type="submit" name="new" value="Add"><br>
    </form>
    <?php
    if(!empty(isset($_POST['new'])))
    {
        $albumname = $_POST['album_name'];
        $albumdate = $_POST['album_date'];
        $albumtag = $_POST['album_tag'];
        $albumby = $_POST['album_by'];

        $query = "INSERT INTO album (name, date, tag, byline) VALUES ('$albumname', '$albumdate','$albumtag', '$albumby')";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            echo "success";
        }
    }
}
else if($gallery == 'gallery')
{
    //:] Add new gallery
    $q = mysqli_query($conn,"SELECT id,name FROM album");
    if(mysqli_num_rows($q)>0)
    {
        while($q_a = mysqli_fetch_assoc($q))
        {
            ?>
            
            <h3 class="link celtic-blue-bg">
                <a href="index.php?gallery=<?php echo $q_a['id']?>"><?php echo $q_a['name'];?></a>
            </h3>
            <?php
        }
    }
}
else
{
    $q = mysqli_query($conn,"SELECT * FROM gallery WHERE album_id = '$gallery'");
    $r_a = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM album WHERE id = '$gallery'"));
    ?>
    <h2 class="link"><?php echo $r_a['name'];?></h2>
    <h3 class="link">by: <?php echo $r_a['byline'];?> (<?php echo $r_a['date'];?>)</h3>
    <?php
    if(mysqli_num_rows($q)>0)
    {
        while($q_a = mysqli_fetch_assoc($q))
        {
            ?>
            <img class="g_image" src="images/gallery/<?php echo $gallery;?>/<?php echo $q_a['name'];?>" alt="">
            <?php
        }
    }
}