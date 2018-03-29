<?php 
class Page{
	public $page;
	public $sql;
	public $stmt;
	public $title;
	public $keywords;
	public $description;
	public $status;
	public $orders;
	public $content;
	public $id;
	public $date_;
	
	public function allPage(){
		$this->page = BD::conection()->query('SELECT * FROM `page`');
		return $this -> page -> fetchAll(PDO::FETCH_ASSOC);
	}
	public function addPage(){
		$this->sql = ('INSERT INTO `page`(`title`, `keywords`, `description`, `status`, `orders`, `content`, `date_`) VALUES (?,?,?,?,?,?,?)');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->title);
		$this->stmt -> bindValue(2, $this->keywords);
		$this->stmt -> bindValue(3, $this->description);
		$this->stmt -> bindValue(4, $this->status);
		$this->stmt -> bindValue(5, $this->orders);
		$this->stmt -> bindValue(6, $this->content);
		$this->stmt -> bindValue(7, $this->date_);
		$this->stmt -> execute();
	}
	public function aditPage(){
		$this->sql = ('UPDATE `page` SET 
		`title` = ?,
		`keywords` = ?,
		`description` = ?,
		`status` = ?,
		`orders` = ?,
		`content` = ?,
		`date_` = ?
		WHERE `id` = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->title);
		$this->stmt -> bindValue(2, $this->keywords);
		$this->stmt -> bindValue(3, $this->description);
		$this->stmt -> bindValue(4, $this->status);
		$this->stmt -> bindValue(5, $this->orders);
		$this->stmt -> bindValue(6, $this->content);
		$this->stmt -> bindValue(7, $this->date_);
		$this->stmt -> bindValue(8, $this->id);
		$this->stmt -> execute();		
	}
	public function inputValue(){
		$this->sql = ('SELECT * FROM `page` WHERE ID = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
		return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
	}
	public function deletePage(){
		$this->sql = ('DELETE FROM `page` WHERE ID = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
	}
	public function buildPage(){
		$this->sql = ('SELECT * FROM `page` WHERE ID = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
		return $this -> stmt -> fetch(PDO::FETCH_ASSOC);		
	}
	public function lastChange(){
		$this -> page = BD::conection()->query('SELECT `date_` FROM `page` ORDER BY `date_` DESC');
		return $this -> page -> fetchColumn();			
	}	
}
?>