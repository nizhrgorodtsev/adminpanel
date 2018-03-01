<?php
class Lastpost{
	public $sql;
	public $stmt;
	public $date_;
	public $id;
	public $name_category;
	public function lastPost(){
		$this->sql = ('SELECT * FROM `article` ORDER BY `date_` DESC');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> execute();
		return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);		
	}
	public function lastPostCategory(){
		$this->sql = ('SELECT `name` FROM `category` WHERE id = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
		$this -> name_category = $this -> stmt -> fetchColumn();		
	}	
}
?>