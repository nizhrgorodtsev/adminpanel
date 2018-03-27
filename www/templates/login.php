
<h2 class="text-center">Login</h2>
<form action="" method="POST">

    <div class="form-group">
      <label for="mail">mail:</label>
      <input type="text" class="form-control" id="mail" required name="mail" placeholder="">
    </div>
	
    <div class="form-group">
      <label for="password">password:</label>
      <input type="text" class="form-control" id="password" required name="password" placeholder="">
    </div>
	
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  
  <?php
	$log = new Users;
	if(!empty($_POST['mail']) &!empty($_POST['password'])){
		$log->mail = $_POST['mail'];
		$log->password = $_POST['password'];
		$log->findHash();
		$log->findSolt();
		$log->chekHash();
	}
  ?>