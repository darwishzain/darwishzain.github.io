<?php
//231p0a95LQ[bp1Nz
$dbhost = "localhost";
$dbuser = "darwish";
$dbpwd = "";
$dbname = "studio";
//$dbhost = "mysql.gb.stackcp.com:52213";//:] remote mysql
//$dbuser = "darwish-bc57";
//$dbpwd = "th3yn33dyourightnowbutwh3nth3ydontth3yllcastyououtlik3al3p3r";
//$dbname = "darwishzain-3530303536e8";
$conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);
if ($conn) {
    ?><script>console.log('Connected')</script><?php
}
else
{
    ?><script>console.log('<?php mysqli_connect_error()?>')</script><?php
    die('Could not connect: ' . mysqli_connect_error());
}
?>