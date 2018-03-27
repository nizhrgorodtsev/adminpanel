<?php 
$users = new Users;
if(!empty($_GET['delete'])) $users->id = $_GET['delete'];
$users->deleteUsers();
header("Location: index.php?page=users");
?>