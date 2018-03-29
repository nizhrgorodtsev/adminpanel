<?php 
	class Comments{
		public $sql;
		public $stmt;
		public $post_id;
		public $status;
		public $name;
		public $text;
		public $date_;
		public $id;
		public $x;
		
		
		public function allComments(){
			$this->sql = ('SELECT * FROM `comments` WHERE `post_id` = ? AND `status` = 1 ORDER BY `date_` DESC LIMIT ?, 3');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->post_id);
			$this->stmt -> bindValue(2, $this->x, PDO::PARAM_INT);
			$this->stmt -> execute();
			return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);			
		}
		public function addComment(){
			$this->sql = ('INSERT INTO `comments`(`name`, `post_id`, `status`, `text`, `date_`) VALUES (?,?,?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->post_id);
			$this->stmt -> bindValue(3, $this->status);
			$this->stmt -> bindValue(4, $this->text);
			$this->stmt -> bindValue(5, $this->date_);
			$this->stmt -> execute();
		}
		public function Comments(){
			$this->sql = ('SELECT * FROM `comments` ORDER BY `date_` DESC');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> execute();
			return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);			
		}
		public function editComments(){
			$this->sql = ('UPDATE `comments` SET 
			`name` = ?,
			`post_id` = ?,
			`status` = ?,
			`text` = ?
			WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->post_id);
			$this->stmt -> bindValue(3, $this->status);
			$this->stmt -> bindValue(4, $this->text);
			$this->stmt -> bindValue(5, $this->id);
			$this->stmt -> execute();	
		}
		public function inputValue(){
				$this->sql = ('SELECT * FROM `comments` WHERE ID = ?');
				$this->stmt = BD::conection()->prepare($this->sql);
				$this->stmt -> bindValue(1, $this->id);
				$this->stmt -> execute();
				return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
			}
		public function deleteComments(){
			$this->sql = ('DELETE FROM `comments` WHERE ID = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}
		public function countComments(){
			$this->sql = ('SELECT * FROM `comments` WHERE category_id = ? AND status = 1 ORDER BY `date_` DESC');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->post_id);
			$this->stmt -> execute();
			return count($this -> stmt -> fetchAll(PDO::FETCH_ASSOC));	
		}
		public function lastChange(){
			$this->sql = BD::conection()->query('SELECT `date_` FROM `comments` ORDER BY `date_` DESC');
			return $this->sql -> fetchColumn();			
		}		
	}
?>