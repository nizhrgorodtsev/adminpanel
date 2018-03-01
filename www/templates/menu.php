<?php
function active($param){
	if(!empty($_GET['menu_id'])){
		if($_GET['menu_id'] == $param)echo "<li class='active'>";
		else echo '<li>';
	}
	else echo '<li>';
}
$menu = new Menu;
foreach ($menu->buildMenu() as $value){
	echo active($value['id']) . "<a href='index.php?menu_id=$value[id]&page_id=$value[page_id]'>$value[name]</a></li>";
}
?>

