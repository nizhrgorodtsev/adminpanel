<?php
//$category = new Category;
//створено в хеді
foreach ($category->buildCategory() as $value){
	 echo "<p><a href='index.php?category_id=$value[id]'>$value[name]</a></p>";
}
?>

