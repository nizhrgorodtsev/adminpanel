<?php
$users = new Users; 
if(!empty($_GET["edit"])) $users->id = $_GET["edit"];
$users -> inputValue();

if(!empty($_POST)){
	$users->name = $_POST["name"];
	$users->lastname = $_POST["lastname"];
	$users->mail = $_POST["mail"];
	$users->password = $_POST["password"];
	$users->phone = $_POST["phone"];
	$users->status = $_POST["status"];
	
	$users->creatHash();
	$users->aditUsers();
	header("Location: index.php?page=users");
}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" value="<?php echo $users->inputValue()['name'];?>">
    </div>
    <div class="form-group">
      <label for="lastname">lastname:</label>
      <input type="text" class="form-control" id="lastname" required name="lastname" value="<?php echo $users->inputValue()['lastname'];?>">
    </div>
    <div class="form-group">
      <label for="mail">mail:</label>
      <input type="text" class="form-control" id="mail" required name="mail" value="<?php echo $users->inputValue()['mail'];?>">
    </div>	
    <div class="form-group">
      <label for="password">password:</label>
      <input type="text" class="form-control" id="password" required name="password" value="<?php echo $users->inputValue()['password'];?>">
    </div>
    <div class="form-group">
      <label for="phone">phone:</label>
      <input type="text" class="form-control" id="phone" required name="phone" value="<?php echo $users->inputValue()['phone'];?>">
    </div>	
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" value="<?php echo $users->inputValue()['status'];?>">
    </div>     
	
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  
