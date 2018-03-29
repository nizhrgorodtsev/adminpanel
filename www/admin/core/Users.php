<?php 
	class Users{
		public $user;
		public $sql;
		public $stmt;
		public $id;
		public $name;
		public $lastname;
		public $mail;
		public $password;
		public $phone;
		public $status;
		public $salt;
		public $hash;
		public $newhash;
		public $date_;
		
		public function buildUsers(){
			$this->user = BD::conection()->query('SELECT * FROM `users` WHERE `status` = 1');
			return $this -> user -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function allUsers(){
			$this->user = BD::conection()->query('SELECT * FROM `users`');
			return $this -> user -> fetchAll(PDO::FETCH_ASSOC);
		}
		public function addUsersItem(){
			$this->sql = ('INSERT INTO `users`(`name`, `lastname`, `mail`, `password`, `salt`, `phone`, `status`, `date_`) VALUES (?,?,?,?,?,?,?,?)');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->lastname);
			$this->stmt -> bindValue(3, $this->mail);
			$this->stmt -> bindValue(4, $this->password);
			$this->stmt -> bindValue(5, $this->salt);
			$this->stmt -> bindValue(6, $this->phone);
			$this->stmt -> bindValue(7, $this->status);
			$this->stmt -> bindValue(8, $this->date_);
			$this->stmt -> execute();
		}
		public function inputValue(){
				$this->sql = ('SELECT * FROM `users` WHERE id = ?');
				$this->stmt = BD::conection()->prepare($this->sql);
				$this->stmt -> bindValue(1, $this->id);
				$this->stmt -> execute();
				return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
			}
		public function aditUsers(){
			$this->sql = ('UPDATE `users` SET 
			`name` = ?,
			`lastname` = ?,
			`mail` = ?,
			`password` = ?,
			`salt` = ?,
			`phone` = ?,
			`status` = ?,
			`date_` = ?
			WHERE `id` = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->name);
			$this->stmt -> bindValue(2, $this->lastname);
			$this->stmt -> bindValue(3, $this->mail);
			$this->stmt -> bindValue(4, $this->password);
			$this->stmt -> bindValue(5, $this->salt);
			$this->stmt -> bindValue(6, $this->phone);
			$this->stmt -> bindValue(7, $this->status);
			$this->stmt -> bindValue(8, $this->date_);
			$this->stmt -> bindValue(9, $this->id);
			$this->stmt -> execute();		
		}
		public function deleteUsers(){
			$this->sql = ('DELETE FROM `users` WHERE ID = ?');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->id);
			$this->stmt -> execute();
		}
		public function creatHash(){
			$this->salt = '$1$' . substr(base64_encode(sha1(uniqid())), 0, 12);
			$this->hash = crypt($this->password, $this->salt);
			$this->password = $this->hash;
		}
		public function findHash(){
			$this->sql = ('SELECT `password`  FROM `users` WHERE `mail` = ? AND `status` = 1');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->mail);
			$this->stmt -> execute();
			$this->hash = $this -> stmt -> fetchColumn();
		}
		public function findSolt(){
			$this->sql = ('SELECT `salt`  FROM `users` WHERE `mail` = ? AND `status` = 1');
			$this->stmt = BD::conection()->prepare($this->sql);
			$this->stmt -> bindValue(1, $this->mail);
			$this->stmt -> execute();
			$this->salt = $this -> stmt -> fetchColumn();
		}	
		public function chekHash(){
			$this->newhash = crypt($this->password, $this->salt);
			if($this->hash == $this->newhash) echo '<hr><p class="bg-success">This text indicates success.</p>';
			else echo '<hr><p class="bg-danger">This text represents danger.</p>';
		}
		public function lastChange(){
			$this -> user = BD::conection()->query('SELECT `date_` FROM `users` ORDER BY `date_` DESC');
			return $this -> user -> fetchColumn();			
		}		
	}
?>