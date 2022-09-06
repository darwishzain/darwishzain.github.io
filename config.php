<?php
//$dbhost = "sdb-q.hosting.stackcp.net";
//$dbuser = "admin-8fc0";
//$dbpassword = "N0m0rep@ssw0rd";
//$dbname = "darwish-3230350c48";

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "darwish-3230350c48";

$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
if ($conn) {
    echo "<script>console.log('Connected')</script>";
}
else
{
    echo "<script>console.log('".mysqli_connect_error."')</script>";
    die('Could not connect: ' . mysqli_connect_error());
}

?>