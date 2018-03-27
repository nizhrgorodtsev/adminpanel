<?php
 function activepag($param){
	if(!empty($_GET['pag'])){
		if($_GET['pag'] == $param) return '<li class="active">';
		else return "<li>";
	}
	else return "<li>";
 }
	$count = $article->countArticle();
?>
<div class="row text-center">
	<ul class="pagination">
	<?php 
		if(!$count % 3) $res = $count / 3;
		else $res = $res = $count / 3 + 1;
		for($i=1; $i<$res; $i++){
			echo activepag($i) . "<a href='?category_id=" . $_GET['category_id'] . "&pag=$i'>$i</a></li>"; 
		}
	?>	
	</ul>
</div>

