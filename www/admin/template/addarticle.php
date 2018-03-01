<?php 
$data = new Article;
$file = new Fileupload;

if(!empty($_FILES['userfile']['name'])){
	$file -> name = $_FILES['userfile']['name'];
	$file -> tmp_name = $_FILES['userfile']['tmp_name'];
	$file -> fileUpload();	
	$data -> img_src = $file -> src;
}
else $data->img_src = "images/placeholder.jpg";

if(!empty($_POST)){
	$data->title = $_POST["title"];
	$data->intro = $_POST["intro"];
	$data->category_id = $_POST["category_id"];
	$data->keywords = $_POST["keywords"];
	$data->description = $_POST["description"];
	$data->status = $_POST["status"];
	$data->date_ = $_POST["date_"];
	$data->content = $_POST["content"];
	
	$data->addArticle();
	header("Location: index.php?page=article");
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control" id="title" required name="title" placeholder="">
    </div>
    <div class="form-group">
      <label for="intro">intro:</label>
      <!--<input type="text" class="form-control" id="intro" required name="intro" placeholder="">-->
           <textarea class="form-control" required name="intro" id="intro" rows="5"></textarea>	  
    </div>
	
	<div class="form-group">
		<label for="userfile">Img:</label>
		<input type="file" name="userfile" id="userfile">
	</div>	
	
    <div class="form-group">
      <label for="category_id">category_id:</label>
      <input type="text" class="form-control" id="category_id" required name="category_id" placeholder="">
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
      <label for="date_">date_:</label>
      <input type="date" class="form-control" id="date_" required name="date_" placeholder="">
    </div>
	<div class="form-group">
      <label for="content">content:</label>
            <textarea name="content" id="content" rows="10">
                
            </textarea>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
    </div>	
    <button type="submit" class="btn btn-success">Add Article</button>
  </form>
