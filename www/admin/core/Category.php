<?php 
	class Category{
		public $category;
		public $sql;
		public $stmt;
		public $name;
		public $status;
		public $orders;
		public $id;
		
		public function buildCategory(){
			$this->category = BD::conection()->query('SELECT * FROM `category` WHERE `status` = 1 ORDER BY `orders`');
			return $this -> category -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function allCategory(){
			$this->category = BD::conection()->query('SELECT * FROM `category` ORDER BY `orders`');
			return $this -> category -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function addCategory(){
			$this->sql = ('INSERT INTO `category`(`name`, `status`, `orders`) VALUES (?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->status);
			$this->stmt -> bindValue(3, $this->orders);
			$this->stmt -> execute();
		}
		public function inputValue(){
				$this->sql = ('SELECT * FROM `category` WHERE ID = ?');
				$this->stmt = BD::conection()->prepare($this->sql);
				$this->stmt -> bindValue(1, $this->id);
				$this->stmt -> execute();
				return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
			}
		public function aditCategory(){
			$this->sql = ('UPDATE `category` SET 
			`name` = ?,
			`status` = ?,
			`orders` = ?
			WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->status);
			$this->stmt -> bindValue(3, $this->orders);
			$this->stmt -> bindValue(4, $this->id);
			$this->stmt -> execute();		
		}
		public function deleteCategory(){
			$this->sql = ('DELETE FROM `category` WHERE ID = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}		
	}
?>