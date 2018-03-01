<?php
$data = new Page; 
if(!empty($_GET["edit"])) $data->id = $_GET["edit"];
$data -> inputValue();

if(!empty($_POST)){
	$data->title = $_POST["title"];
	$data->keywords = $_POST["keywords"];
	$data->description = $_POST["description"];
	$data->status = $_POST["status"];
	$data->orders = $_POST["orders"];
	$data->content = $_POST["content"];
	
	$data->aditPage();
	header("Location: index.php?page=allpages");
}
?>
<form action="" method="POST">
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control" id="title" required name="title" value="<?php echo $data->inputValue()['title'];?>">
    </div>
    <div class="form-group">
      <label for="keywords">keywords:</label>
      <input type="text" class="form-control" id="keywords" required name="keywords" value="<?php echo $data->inputValue()['keywords'];?>">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <input type="text" class="form-control" id="description" required name="description" value="<?php echo $data->inputValue()['description'];?>">
    </div>	
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" value="<?php echo $data->inputValue()['status'];?>">
    </div>	
    <div class="form-group">
      <label for="orders">orders:</label>
      <input type="text" class="form-control" id="orders" required name="orders" value="<?php echo $data->inputValue()['orders'];?>">
    </div>    
	<div class="form-group">
      <label for="content">content:</label>
            <textarea name="content" id="content" rows="10">
                <?php echo $data->inputValue()['content'];?>
            </textarea>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
    </div>

	
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  
