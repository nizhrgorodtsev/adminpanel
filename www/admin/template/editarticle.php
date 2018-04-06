<?php
$category = new Category;
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

elseif($article->inputValue()['img_src'] != "images/placeholder.jpg"){
	$article->img_src = $article->inputValue()['img_src'];
}
else $article->img_src = "images/placeholder.jpg";

if(!empty($_POST)){
	$article->title = $_POST["title"];
	$article->intro = $_POST["intro"];
	$article->category_name = $_POST["category_name"];
	$article->category_id = $_POST["category_id"];
	$article->keywords = $_POST["keywords"];
	$article->description = $_POST["description"];
	$article->status = $_POST["status"];
	$article->date_ = date("Y-m-d H:i:s");
	$article->content = $_POST["content"];
	
	$article->aditArticle();

	header("Location: index.php?page=article");
	/*
	echo "<pre>"; 
	print_r($_POST);
	echo $article->category_id;
	echo "</pre>";
	*/
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control" id="title" required name="title" value="<?php echo htmlspecialchars($article->inputValue()['title']);?>">
    </div>
    <div class="form-group">
      <label for="intro">intro:</label>
           <textarea class="form-control" required name="intro" id="intro" rows="5" ><?php echo $article->inputValue()['intro'];?></textarea>	  
    </div>
	
	<div class="form-group clearfix" id="miniimg">
	<img src="../<?php echo $article->inputValue()['img_src'] ?>" alt="" class="pull-left" style="margin:0 15px 0 0; height:100px;">
	<label for="userfile">Img:</label>
	<input type="file" id="file" name="userfile">
	</div>
<script>
var file = document.getElementById("file");
file.onchange=function(){
	var upload_file=file.files[0];
	var form=new FormData();
	form.append("userfile",upload_file);

	var xhr=new XMLHttpRequest();
	xhr.open("POST","core/AjaxFileupload.php",true);
	xhr.send(form);

	xhr.onreadystatechange = function(){
	if(xhr.readyState == 4){
		var node = document.createElement("SPAN");
		node.innerHTML = xhr.responseText;
		var list = document.getElementById("miniimg");
		list.removeChild(list.childNodes[1]);
		list.insertBefore(node, list.childNodes[1]);
		}
	}
}
</script>	
	
    <div class="form-group">
      <label for="category_id">category_name:</label>
      <select class="form-control" id="category_name" required name="category_name" onchange="changeCategory()" data-edit="<?php echo $_GET["edit"]; ?>">
		<?php 
		$arr = $category -> allCategory();
		foreach($arr as $value){
			if($article->inputValue()['category_id'] !== $value["id"]){
			echo "<option>$value[name]</option>";
			}
			else echo "<option selected>$value[name]</option>";
		}
		?>
		
	  </select>
	  <input type="hidden" name="category_id" id="categoryid">
<script>
$(document).ready(function(){
	changeCategory();
});
function changeCategory() {
	var x = document.getElementById("category_name");
	var i = x.selectedIndex;
	var option = x.options[i].text;
	var id = document.getElementById("categoryid");
	var ctid = new XMLHttpRequest();
	ctid.open("POST","template/ajaxCategoryId2.php",true);
	ctid.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ctid.send('category_name='+option);

	ctid.onreadystatechange = function(){
	if(ctid.readyState == 4){
		id.setAttribute("value", ctid.responseText); 
		}
	}	
}
</script>   
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
	  <input type="hidden" id="on-off-switch-notext" name="status" value="<?php echo $article->inputValue()['status'];?>">
      <!--<input type="text" class="form-control" id="status" required name="status" value="<?php //echo $article->inputValue()['status'];?>">-->
    </div><!--	
    <div class="form-group">
      <label for="date_">date_:</label>
      <input type="date" class="form-control" id="date_" required name="date_" value="<?php //echo $article->inputValue()['date_'];?>">
    </div>-->
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
<script type="text/javascript">
    new DG.OnOffSwitch({
        el: '#on-off-switch-notext'
    });
</script>  
