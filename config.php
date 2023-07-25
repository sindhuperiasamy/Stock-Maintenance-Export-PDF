<?php 
ob_start();
$db_server="localhost";
$db_DataBase="shri_stock";
$db_Username="root";
$db_Password="";
$conn=mysqli_connect($db_server,$db_Username,$db_Password,$db_DataBase) or die ('Connection error'.mysql_error()); 
$db=mysqli_select_db($conn,$db_DataBase);
if(!$db){
	echo "Db Error";
}else{
	session_start();
}
define('WEBSITE_URL','http://localhost/sri')
?>