
<nav><ul>
<?php
if(isset($_GET['home'])){
    ?>
    <li >
        <a class='active' href='./index.php?home=true'>
            <img class='logo' src='./static/image/dzslogo.png' alt='' srcset='' height='30px' width='30px'>
        </a>
    </li>
    <?php
}else{
    ?>
    <li >
        <a href='./index.php?home=true'>
            <img class='logo' src='./static/image/dzslogo.png' alt='' srcset='' height='30vw' width='30vw'>
        </a>
    </li>
    <?php
}

if(isset($_GET['project']))
{
    ?>
        <li >
            <a class='active' href='./index.php?project=true'>Project</a>
        </li>
    <?php
}
else
{
    ?>
        <li>
            <a href='./index.php?project=true'>Project</a>
        </li>
    <?php
}

if(isset($_GET['contact']))
{
    ?>
    <li>
        <a class='active' href='./index.php?contact=true'>Contact</a>
    </li>
    <?php
}
else
{
    ?>
    <li>
        <a href='./index.php?contact=true'>Contact</a>
    </li>
    <?php
}

if(isset($_GET['about']))
{
    ?>
    <li>
        <a class='active' href='./index.php?about=true'>About</a>
    </li>
    <?php
}
else
{
    ?>
    <li>
        <a href='./index.php?about=true'>About</a>
    </li>
    <?php
}
?>
</ul></nav>