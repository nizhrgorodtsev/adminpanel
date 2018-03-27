<h2 class="text-center">Registration</h2>
<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" placeholder="">
    </div>
    <div class="form-group">
      <label for="lastname">lastname:</label>
      <input type="text" class="form-control" id="lastname" required name="lastname" placeholder="">
    </div>
    <div class="form-group">
      <label for="email">email:</label>
      <input type="text" class="form-control" id="email" required name="email" placeholder="">
    </div>
    <div class="form-group">
      <label for="password">password:</label>
      <input type="text" class="form-control" id="password" required name="password" placeholder="">
    </div>	
    <div class="form-group">
      <label for="phone">phone:</label>
      <input type="text" class="form-control" id="phone" required name="phone" placeholder="">
    </div>	
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  
  <?php 
$users = new Users;
if(!empty($_POST)){
	$users->name = $_POST["name"];
	$users->lastname = $_POST["lastname"];
	$users->mail = $_POST["email"];
	$users->password = $_POST["password"];
	$users->phone = $_POST["phone"];
	$users->status = '1';
	
	$users->creatHash();
	$users->addUsersItem();
	echo '<hr><p class="bg-success">Thanks for registration</p>';
}
?>