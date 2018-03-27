<?php 
	function __autoload($class_name){
		include 'admin/core/' . $class_name . '.' . 'php';
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php require "templates/head.php" ?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<?php include "templates/menu.php"?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	    <li><a href="index.php?page=reg">Registration</a></li>
        <li><a href="index.php?page=log"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
	<h4 class="text-center">Категорії:</h4><hr>
	  <?php include "templates/category.php" ?>
    </div>
    <div class="col-sm-8 text-left">
		<?php include "templates/content.php" ?>
    </div>
    <div class="col-sm-2 sidenav">
	<?php include "templates/lastpost.php"?>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
