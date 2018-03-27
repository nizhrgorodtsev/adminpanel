<?php 
function __autoload($class_name){ include "core/" . $class_name . "." . "php";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>

</head>
<body>
	  <?php 
		function active($param){
			if(!empty($_GET['page'])){
				if($_GET['page'] == $param)echo '<li class="active">';
				else echo '<li>';
			}
			else echo '<li>';
		}
	  ?>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">

      <a href="index.php"><img src="images/adminka.png" class="img-responsive center-block"></a>
	  
      <div class="input-group" style="margin-bottom:15px;">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
	  
      <ul class="nav nav-pills nav-stacked">
        <?php active('dashboard')?><a href="?page=dashboard">Dashboard</a></li>
        <?php active('menu')?><a href="?page=menu">Menu</a></li>
        <?php active('article')?><a href="?page=article">Article</a></li>
        <?php active('allpages')?><a href="?page=allpages">Pages</a></li>
		<?php active('category')?><a href="?page=category">Category</a></li>
		<?php active('users')?><a href="?page=users">Users</a></li>
		<?php active('comments')?><a href="?page=comments">Comments</a></li>
      </ul><br>
    </div>


    <div class="col-sm-9">
		<div class="page-header">
		  <h3 id="mainheader" class="text-center">  
		  <?php 
			if(!empty($_GET["page"])) echo $_GET["page"];
			else echo "dashboard";
		  ?>
		  </h3>
		</div>
		
	  <?php 
		if(!empty($_GET["page"])) include "template/" . $_GET["page"] . "." . "php";
		else include "template/dashboard.php";
	  ?>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p class="text-center">Footer Text</p>
</footer>

</body>
</html>
