<?php 
$article = new Article;
if(!empty($_GET['delete'])) $article->id = $_GET['delete'];
$article->deleteArticle();
header("Location: index.php?page=article");
?>