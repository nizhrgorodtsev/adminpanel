<?php 
	class Menu{
		public $menu;
		public $sql;
		public $stmt;
		public $name;
		public $page_id;
		public $status;
		public $orders;
		public $id;
		public $date_;
		
		public function buildMenu(){
			$this->menu = BD::conection()->query('SELECT * FROM `menu` WHERE `status` = 1 ORDER BY `orders`');
			return $this -> menu -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function allMenu(){
			$this->menu = BD::conection()->query('SELECT * FROM `menu` ORDER BY `orders`');
			return $this -> menu -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function addMenuItem(){
			$this->sql = ('INSERT INTO `menu`(`name`, `page_id`, `status`, `orders`, `date_`) VALUES (?,?,?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->page_id);
			$this->stmt -> bindValue(3, $this->status);
			$this->stmt -> bindValue(4, $this->orders);
			$this->stmt -> bindValue(5, $this->date_);
			$this->stmt -> execute();
		}
		public function inputValue(){
				$this->sql = ('SELECT * FROM `menu` WHERE ID = ?');
				$this->stmt = BD::conection()->prepare($this->sql);
				$this->stmt -> bindValue(1, $this->id);
				$this->stmt -> execute();
				return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
			}
		public function aditMenu(){
			$this->sql = ('UPDATE `menu` SET 
			`name` = ?,
			`page_id` = ?,
			`status` = ?,
			`orders` = ?,
			`date_` = ?
			WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->page_id);
			$this->stmt -> bindValue(3, $this->status);
			$this->stmt -> bindValue(4, $this->orders);
			$this->stmt -> bindValue(5, $this->date_);
			$this->stmt -> bindValue(6, $this->id);
			$this->stmt -> execute();		
		}
		public function deleteMenu(){
			$this->sql = ('DELETE FROM `menu` WHERE ID = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}
		public function lastChange(){
			$this -> menu = BD::conection()->query('SELECT `date_` FROM `menu` ORDER BY `date_` DESC');
			return $this -> menu -> fetchColumn();			
		}
	}
?>