<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$dbhost = "";
$dbuser = "";
$dbpassword = "";
$dbname = "";
function config()
{
    $dbhost = "sdb-q.hosting.stackcp.net";
    $dbuser = "admin-8fc0";
    $dbpassword = "N0m0rep@ssw0rd";
    $dbname = "darwish-3230350c48";
}
function config_dev()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "darwish";
}
//config();
config_dev();
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "darwish";
$conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

//! variable undefined 
//? What's the problem
//! $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
//? why is this here $conn = mysqli_connect("localhost","root","","darwish");
if ($conn) {
    echo "<script>console.log('Connected')</script>";
}
else
{
    echo "<script>console.log('".mysqli_connect_error."')</script>";
    die('Could not connect: ' . mysqli_connect_error());
}
