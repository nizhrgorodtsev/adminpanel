<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" placeholder="">
    </div>
    <div class="form-group">
      <label for="page_id">page_id:</label>
      <input type="text" class="form-control" id="page_id" required name="page_id" placeholder="">
    </div>
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" placeholder="">
    </div>	
    <div class="form-group">
      <label for="orders">orders:</label>
      <input type="text" class="form-control" id="orders" required name="orders" placeholder="">
    </div>
    <button type="submit" class="btn btn-success">Add Item</button>
  </form>
<?php 
$menu = new Menu;
if(!empty($_POST)){
	$menu->name = $_POST["name"];
	$menu->page_id = $_POST["page_id"];
	$menu->status = $_POST["status"];
	$menu->orders = $_POST["orders"];
	
	$menu->addMenuItem();
	header("Location: index.php?page=menu");
}
?>