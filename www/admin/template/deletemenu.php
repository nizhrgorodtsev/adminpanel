<?php 
$menu = new Menu;
if(!empty($_GET['delete'])) $menu->id = $_GET['delete'];
$menu->deleteMenu();
header("Location: index.php?page=menu");
?>