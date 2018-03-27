<?php
function __autoload($class_name){
	include '../admin/core/' . $class_name . '.' . 'php';
}
date_default_timezone_set('Europe/Kiev'); 
	$comments = new Comments;
	if(!empty($_POST)){
		$comments -> post_id = $_POST['postid'];
		$comments->name = $_POST['name'];
		$comments->status = '1';
		$comments->text = $_POST['text'];
		$comments->date_ = date("Y-m-d H:i:s");
		$comments->addComment();
	}
echo "
	<h4><i>$_POST[name]</i></h4>
	<i>$comments->date_</i>
	<blockquote><i>$_POST[text]</i></blockquote>	
"; 	
?>