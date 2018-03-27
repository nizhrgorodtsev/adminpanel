<?php 
function __autoload($class_name){
	include '../admin/core/' . $class_name . '.' . 'php';
}

 $comments = new Comments;
 $comments -> post_id = $_POST['postid'];
 $comments -> x = (int) $_POST['x'];
 $arr = $comments->allComments();
 foreach($arr as $value){
	echo"
	<div>
		<h4><i>$value[name]</i></h4>
		<i>$value[date_]</i>
		<blockquote><i>$value[text]</i></blockquote>
	</div>	
	";
 }
 

?>

