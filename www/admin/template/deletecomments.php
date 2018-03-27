<?php 
$comments = new Comments;
if(!empty($_GET['delete'])) $comments->id = $_GET['delete'];
$comments->deleteComments();
header("Location: index.php?page=comments");
?>