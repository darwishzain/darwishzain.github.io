<nav class="w100 bg-persian-green fg-white-smoke">
    <a href="index.php">Darwish Zain</a>
    <a href="index.php?project">Project</a>
    <a href="index.php?link=b">Album</a>
    <a href="index.php?link">Link</a>
    <a class="bg-golden-poppy fg-black" href="https://boyrecluse.blogspot.com">Blog</a>
    <a class="bg-celtic-blue" href="https://jeli.com.my">Jeli.my</a>
    <?php
    if(isset($_SESSION['user_id']))
    {
        ?>
        <a href="profile.php?logout">Logout</a>
        <?php
    }
    else
    {
        ?>
        <a class="" href="profile.php?login">Login</a>
        <?php
    }
    ?>
</nav>
