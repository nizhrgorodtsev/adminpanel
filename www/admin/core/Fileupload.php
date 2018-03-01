<?php 
class Fileupload{
	public $uploaddir;
	public $uploadfile;
	public $name;
	public $tmp_name;
	public $src;
	
	public function fileUpload(){
		$this -> uploaddir = '../images/';
		$this -> uploadfile = $this -> uploaddir . basename($this->name);
		move_uploaded_file($this->tmp_name, $this -> uploadfile);
		$this -> src = substr($this -> uploadfile , 3);
	}
}
?>