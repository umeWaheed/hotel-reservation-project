<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="project";

//create connection
$conn = mysqli_connect($servername,$username,$password)
or die('error');

//check conn
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//echo ",Connected successfully";

//select db
$select = mysqli_select_db($conn,$database_name)
or die ('db not available');
if($select)
   // echo (",db selected");

?>
