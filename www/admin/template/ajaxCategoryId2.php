<?php 
include "../core/Article.php";
include "../core/BD.php";
$data = new Article;
$data -> category_name = $_POST["category_name"];
$data -> category_id = $data->categoryID();
echo $data -> category_id;
?>