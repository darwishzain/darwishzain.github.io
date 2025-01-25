<?php
//$dbhost = "sdb-q.hosting.stackcp.net";
//$dbuser = "admin-8fc0";
//$dbpwd = "N0m0rep@ssw0rd";
//$dbname = "darwish-3230350c48";

//$dbhost = "sdb-53.hosting.stackcp.net";
$dbhost = "mysql.gb.stackcp.com:52213";//:] remote mysql
$dbuser = "darwish-bc57";
$dbpwd = "th3yn33dyourightnowbutwh3nth3ydontth3yllcastyououtlik3al3p3r";
$dbname = "darwishzain-3530303536e8";
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