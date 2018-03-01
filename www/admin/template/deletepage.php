<?php 
$data = new Page;
if(!empty($_GET['delete'])) $data->id = $_GET['delete'];
$data->deletePage();
header("Location: index.php?page=allpages");
?>