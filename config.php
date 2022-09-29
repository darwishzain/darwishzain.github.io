<?php
//$dbhost = "sdb-q.hosting.stackcp.net";
//$dbuser = "admin-8fc0";
//$dbpwd = "N0m0rep@ssw0rd";
//$dbname = "darwish-3230350c48";

//$dbhost = "sdb-o.hosting.stackcp.net";
$dbhost = "mysql.gb.stackcp.com:51316";//:] remote mysql
$dbuser = "admin-8fc0";
$dbpwd = "N0m0rep@ssw0rd";
$dbname = "darwish-3230350c48";
$conn = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);
if ($conn) {
    echo "<script>console.log('Connected')</script>";
}
else
{
    ?><script>console.log('<?php mysqli_connect_error()?>')</script><?php
    die('Could not connect: ' . mysqli_connect_error());
}

?>