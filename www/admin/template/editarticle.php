<?php
$article = new Article;
$file = new Fileupload; 
if(!empty($_GET["edit"])) $article->id = $_GET["edit"];
$article -> inputValue();

if(!empty($_FILES['userfile']['name'])){
	$file -> name = $_FILES['userfile']['name'];
	$file -> tmp_name = $_FILES['userfile']['tmp_name'];
	$file -> fileUpload();	
	$article->img_src = $file -> src;
}
else $article->img_src = "images/placeholder.jpg";

if(!empty($_POST)){
	$article->title = $_POST["title"];
	$article->intro = $_POST["intro"];
	$article->category_id = $_POST["category_id"];
	$article->keywords = $_POST["keywords"];
	$article->description = $_POST["description"];
	$article->status = $_POST["status"];
	$article->date_ = $_POST["date_"];
	$article->content = $_POST["content"];
	
	$article->aditArticle();

	header("Location: index.php?page=article");
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control" id="title" required name="title" value="<?php echo $article->inputValue()['title'];?>">
    </div>
    <div class="form-group">
      <label for="intro">intro:</label>
           <textarea class="form-control" required name="intro" id="intro" rows="5" ><?php echo $article->inputValue()['intro'];?></textarea>	  
    </div>
	
	<div class="form-group">
	<label for="userfile">Img:</label>
	<input type="file" name="userfile" id="userfile">
	</div>
	
    <div class="form-group">
      <label for="category_id">category_id:</label>
      <input type="text" class="form-control" id="category_id" required name="category_id" value="<?php echo $article->inputValue()['category_id'];?>">
    </div>	
    <div class="form-group">
      <label for="keywords">keywords:</label>
      <input type="text" class="form-control" id="keywords" required name="keywords" value="<?php echo $article->inputValue()['keywords'];?>">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <input type="text" class="form-control" id="description" required name="description" value="<?php echo $article->inputValue()['description'];?>">
    </div>	
    <div class="form-group">
      <label for="status">status:</label>
      <input type="text" class="form-control" id="status" required name="status" value="<?php echo $article->inputValue()['status'];?>">
    </div>	
    <div class="form-group">
      <label for="date_">date_:</label>
      <input type="date" class="form-control" id="date_" required name="date_" value="<?php echo $article->inputValue()['date_'];?>">
    </div>
	<div class="form-group">
      <label for="content">content:</label>
            <textarea name="content" id="content" rows="10">
                <?php echo $article->inputValue()['content'];?>
            </textarea>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
    </div>	
    <button type="submit" class="btn btn-success">Save</button>
  </form>
  
