<?php
$comments = new Comments; 
if(!empty($_GET["edit"])) $comments->id = $_GET["edit"];
$comments -> inputValue();

if(!empty($_POST)){
	$comments->name = $_POST["name"];
	$comments->post_id = $_POST["post_id"];
	$comments->status = $_POST["status"];
	$comments->text = $_POST["text"];
	
	$comments->editComments();
	header("Location: index.php?page=comments");
}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" required name="name" value="<?php echo $comments->inputValue()['name'];?>">
    </div>
    <div class="form-group">
      <label for="post_id">post_id:</label>
      <input type="text" class="form-control" id="post_id" required name="post_id" value="<?php echo $comments->inputValue()['post_id'];?>">
    </div>
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" value="<?php echo $comments->inputValue()['status'];?>">
    </div>	
    <div class="form-group">
      <label for="text">text:</label>
      <input type="text" class="form-control" id="text" required name="text" value="<?php echo $comments->inputValue()['text'];?>">
    </div>
    
	
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  
