<?php
$menu = new Menu; 
if(!empty($_GET["edit"])) $menu->id = $_GET["edit"];
$menu -> inputValue();

if(!empty($_POST)){
	$menu->name = $_POST["name"];
	$menu->page_id = $_POST["page_id"];
	$menu->status = $_POST["status"];
	$menu->orders = $_POST["orders"];
	$menu->date_ = date("Y-m-d H:i:s");
	
	$menu->aditMenu();
	header("Location: index.php?page=menu");
}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" value="<?php echo $menu->inputValue()['name'];?>">
    </div>
    <div class="form-group">
      <label for="page_id">page_id:</label>
      <input type="text" class="form-control" id="page_id" required name="page_id" value="<?php echo $menu->inputValue()['page_id'];?>">
    </div>
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" value="<?php echo $menu->inputValue()['status'];?>">
    </div>	
    <div class="form-group">
      <label for="orders">orders:</label>
      <input type="text" class="form-control" id="orders" required name="orders" value="<?php echo $menu->inputValue()['orders'];?>">
    </div>    
	
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  
