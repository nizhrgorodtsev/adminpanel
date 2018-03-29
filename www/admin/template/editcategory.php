<?php
$category = new Category; 
if(!empty($_GET["edit"])) $category->id = $_GET["edit"];
$category -> inputValue();

if(!empty($_POST)){
	$category->name = $_POST["name"];
	$category->status = $_POST["status"];
	$category->orders = $_POST["orders"];
	$category->date_ = date("Y-m-d H:i:s");
	
	$category->aditCategory();
	header("Location: index.php?page=category");
}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" value="<?php echo $category->inputValue()['name'];?>">
    </div>
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" value="<?php echo $category->inputValue()['status'];?>">
    </div>	
    <div class="form-group">
      <label for="orders">orders:</label>
      <input type="text" class="form-control" id="orders" required name="orders" value="<?php echo $category->inputValue()['orders'];?>">
    </div>    
	
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  
