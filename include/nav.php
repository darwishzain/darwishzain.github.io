<?php
echo "<ul>";
if(isset($_GET['home'])){
    echo "<li ><a class='active' href='./index.php?home=true'>
    <img class='logo' src='./img/dzslogo.png' alt='' srcset='' height='30px' width='30px'>
    </a></li>";
}else{
    echo "<li ><a href='./index.php?home=true'>
    <img class='logo' src='./img/dzslogo.png' alt='' srcset='' height='30vw' width='30vw'>
    </a></li>";
}

if(isset($_GET['project']))
{echo "<li ><a class='active' href='./index.php?project=true'>Project</a></li>";}
else{echo "<li > <a href='./index.php?project=true'>Project</a></li>";}

if(isset($_GET['contact']))
{echo "<li> <a class='active' href='./index.php?contact=true'>Contact</a></li>";}
else{echo "<li > <a href='./index.php?contact=true'>Contact</a> </li>";}

if(isset($_GET['about']))
{echo "<li ><a class='active' href='./index.php?about=true'>About</a></li>";}
else{echo "<li > <a href='./index.php?about=true'>About</a></li>";}

echo "</ul>";