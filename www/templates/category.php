<?php
$category = new Category;
foreach ($category->buildCategory() as $value){
	 echo "<p><a href='index.php?category_id=$value[id]'>$value[name]</a></p>";
}
?>

