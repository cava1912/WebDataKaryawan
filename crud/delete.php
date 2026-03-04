<?php
include_once("../connect/config.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM karyawan WHERE id=$id");
 
header("Location:../index.php");
?>