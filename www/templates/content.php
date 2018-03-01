<?php 
if(!empty($_GET['page_id'])){ 
$page = new Page;
$page->id=$_GET['page_id'];
$page->buildPage();
echo $page->buildPage()['content'];
}

else if(!empty($_GET['category_id'])){
$article = new Article;
$article->category_id = $_GET['category_id'];
$article->buildArticle();
	foreach($article->buildArticle() as $value){
		echo "<h2>$value[title]</h2><p><i>$value[date_]</i></p><div><img src='$value[img_src]' style='float:left; margin-left:15px; margin-right:15px; width:100px'>$value[intro]...</div><div><a href='index.php?post_id=$value[id]'>Read more</a></div>";
	}
}
else if(!empty($_GET['post_id'])){
$article = new Article;
$article->id = $_GET['post_id'];
$article->buildPost();
echo "<h2>" . $article->buildPost()['title'] . "</h2><div>" . $article->buildPost()['content'] . "</div>";
}

else {
$page = new Page;
$page->id=3;
$page->buildPage();
echo $page->buildPage()['content'];	
}
?>