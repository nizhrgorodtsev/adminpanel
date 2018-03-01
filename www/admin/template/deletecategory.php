<?php 
$category = new Category;
if(!empty($_GET['delete'])) $category->id = $_GET['delete'];
$category->deleteCategory();
header("Location: index.php?page=category");
?>