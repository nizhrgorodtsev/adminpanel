<?php 
	$menu = new Menu;
	$menucount = $menu -> buildMenu();
	$article = new Article;
	$articlecount = $article -> allArticle();
	$page = new Page;
	$pagecount = $page -> allPage();
	$category = new Category;
	$categorycount = $category -> buildCategory();
	$users = new Users;
	$userscount = $users -> buildUsers();
	$comments = new Comments;
	$commentscount = $comments -> Comments();
?>
<div class="row">
	<div class="col-md-4">
		<div class="dashboard">
			<p class="text-info"><strong><a href="?page=menu">Menu</a></strong></p>
			<h2 class="text-center green"><span class="run"><?php echo count($menucount); ?></span> Menu Items</h2>
			<p class="text-muted">Last change: <?php echo $menu -> lastChange(); ?></p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="dashboard">
			<p class="text-info"><strong><a href="?page=article">Articles</a></strong></p>
			<h2 class="text-center blue"><span class="run"><?php echo count($articlecount); ?></span> Articles</h2>
			<p class="text-muted">Last change: <?php echo $article -> lastChange(); ?></p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="dashboard">
			<p class="text-info"><strong><a href="?page=allpages">Pages</a></strong></p>
			<h2 class="text-center fiol"><span class="run"><?php echo count($pagecount); ?></span> Pages</h2>
			<p class="text-muted">Last change: <?php echo $page -> lastChange(); ?></p>
		</div>
	</div>	
</div>
<div class="row">
	<div class="col-md-4">
		<div class="dashboard">
			<p class="text-info"><strong><a href="?page=category">Categories</a></strong></p>
			<h2 class="text-center brown"><span class="run"><?php echo count($categorycount); ?></span> Categories</h2>
			<p class="text-muted">Last change: <?php echo $category -> lastChange(); ?></p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="dashboard">
			<p class="text-info"><strong><a href="?page=users">Users</a></strong></p>
			<h2 class="text-center oliv"><span class="run"><?php echo count($userscount); ?></span> Users</h2>
			<p class="text-muted">Last change: <?php echo $users -> lastChange(); ?></p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="dashboard">
			<p class="text-info"><strong><a href="?page=comments">Comments</a></strong></p>
			<h2 class="text-center cyan"><span class="run"><?php echo count($commentscount); ?></span> Comments</h2>
			<p class="text-muted">Last change: <?php echo $comments -> lastChange(); ?></p>
		</div>
	</div>	
</div>