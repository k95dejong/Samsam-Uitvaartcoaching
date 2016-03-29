<?php
//include ('head.php');
require('dbconnect.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM `coaches` WHERE `coaches_id` = $id";
$result = mysqli_query($conn, $query);
header("Location: coacheslist.php");
?>