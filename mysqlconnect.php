<?php
/**********MYSQL Settings****************/
$host="localhost";
$databasename="test";
$user="root";
$pass="";
/**********MYSQL Settings****************/


$conn= new mysqli($host,$user,$pass,$databasename);

if($conn)
{
$db_selected = mysqli_select_db($conn,$databasename);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysqli_error());
}
}
else
{
    die('Not connected : ' . mysqli_error());
}
?>
