<form action="" method="POST">
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control" id="title" required name="title" placeholder="">
    </div>
    <div class="form-group">
      <label for="keywords">keywords:</label>
      <input type="text" class="form-control" id="keywords" required name="keywords" placeholder="">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <input type="text" class="form-control" id="description" required name="description" placeholder="">
    </div>	
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" placeholder="">
    </div>	
    <div class="form-group">
      <label for="orders">orders:</label>
      <input type="text" class="form-control" id="orders" required name="orders" placeholder="">
    </div>
	<div class="form-group">
      <label for="content">content:</label>
            <textarea name="content" id="content" rows="10">
                
            </textarea>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
    </div>	
    <button type="submit" class="btn btn-success">Add Page</button>
  </form>
<?php 
$data = new Page;
if(!empty($_POST)){
	$data->title = $_POST["title"];
	$data->keywords = $_POST["keywords"];
	$data->description = $_POST["description"];
	$data->status = $_POST["status"];
	$data->orders = $_POST["orders"];
	$data->content = $_POST["content"];
	$data->date_ = date("Y-m-d H:i:s");
	
	$data->addPage();
	header("Location: index.php?page=allpages");
}
?>