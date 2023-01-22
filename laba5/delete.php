<?php
$id = $_GET['id'];
$connection = new mysqli("localhost", "root", "", "cactus");
$query = "DELETE FROM `cactus` WHERE id = $id";
$query2 = mysqli_query($connection, $query);
header('location: index.php?page = list');
?>