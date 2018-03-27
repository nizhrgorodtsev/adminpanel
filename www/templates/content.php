<?php 
if(!empty($_GET['page_id'])){ 
//$page = new Page; 
//створено в хеді
$page->id=$_GET['page_id'];
//$page->buildPage(); 
//запущено в хеді
echo $page->buildPage()['content'];
}

elseif(!empty($_GET['category_id'])){
$article = new Article;
$article->category_id = $_GET['category_id'];
if(!empty($_GET['pag'])){
	if($_GET['pag']==1){
	$article->pag = $_GET['pag']-1;
	}
	else $article->pag = ($_GET['pag']-1)*3;
}
else $article->pag = 0;
$article->buildArticle();
	foreach($article->buildArticle() as $value){
		echo "<div class='clearfix'><h2>$value[title]</h2><p><i>$value[date_]</i></p><div><img src='$value[img_src]' style='float:left; margin-left:15px; margin-right:15px; width:100px'>$value[intro]...</div><div><a href='index.php?post_id=$value[id]'>Read more</a></div></div>";
	}
	include "templates/pagination.php";
}

elseif(!empty($_GET['post_id'])){
$article->id = $_GET['post_id'];
echo "<div class='clearfix'><h2 id='title' data-postid='" . $article->id . "'>" . $article->buildPost()['title'] . "</h2><div>" . $article->buildPost()['content'] . "</div></div>";
include "comments.php";
}
elseif(!empty($_GET['page'])){
	if($_GET['page'] == 'reg') include "registration.php";
	if($_GET['page'] == 'log') include "login.php";
}

else {
$page = new Page;
$page->id=3;
$page->buildPage();
echo $page->buildPage()['content'];	
}
?>

