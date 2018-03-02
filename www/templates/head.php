<?php
$page = new Page;
$article = new Article;
$category = new Category;
?>
<head>
  <title>
  <?php
	if(!empty($_GET['page_id'])){
		$page -> id = $_GET['page_id'];
		$page -> buildPage();
		echo $page->buildPage()['title'];
	}

	elseif(!empty($_GET['post_id'])){
		$article->id = $_GET['post_id'];
		$article->buildPost();
		echo $article->buildPost()['title'];		
	}
	elseif(!empty($_GET['category_id'])){
		$category->id = $_GET['category_id'];
		$category->inputValue();
		echo $category->inputValue()['name'];		
	}
	else echo "Site";
  ?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>