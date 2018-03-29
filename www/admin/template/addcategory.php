<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" placeholder="">
    </div>
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" placeholder="">
    </div>	
    <div class="form-group">
      <label for="orders">orders:</label>
      <input type="text" class="form-control" id="orders" required name="orders" placeholder="">
    </div>
    <button type="submit" class="btn btn-success">Add Category</button>
  </form>
<?php 
$category = new Category;
if(!empty($_POST)){
	$category->name = $_POST["name"];
	$category->status = $_POST["status"];
	$category->orders = $_POST["orders"];
	$category->date_ = date("Y-m-d H:i:s");
	
	$category->addCategory();
	header("Location: index.php?page=category");
}
?>