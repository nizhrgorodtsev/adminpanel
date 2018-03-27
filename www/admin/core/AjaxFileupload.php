<?php 
class Fileupload{
	public $uploaddir;
	public $uploadfile;
	public $name;
	public $tmp_name;
	public $src;
	
	public function fileUpload(){
		$this -> uploaddir = '../../images/';
		$this -> uploadfile = $this -> uploaddir . basename($this->name);
		move_uploaded_file($this->tmp_name, $this -> uploadfile);
		$this -> src = substr($this -> uploadfile , 6);
	}
}
$file = new Fileupload; 

if(!empty($_FILES['userfile']['name'])){
	$file -> name = $_FILES['userfile']['name'];
	$file -> tmp_name = $_FILES['userfile']['tmp_name'];
	$file -> fileUpload();
	
}
echo "
		<img src=../" . $file->src . " alt='' class='pull-left' style='margin:0 15px 0 0; height:100px;'>
";


//echo "<pre>"; print_r($_FILES);

?>

