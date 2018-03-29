<?php 
class Article{
	public $article;
	public $sql;
	public $stmt;
	public $title;
	public $intro;
	public $keywords;
	public $description;
	public $status;
	public $content;
	public $category_id;
	public $date_;
	public $id;
	public $img_src;
	public $pag;
	
	public function allArticle(){
		$this->article = BD::conection()->query('SELECT * FROM `article`');
		return $this -> article -> fetchAll(PDO::FETCH_ASSOC);
	}
	public function addArticle(){
		$this->sql = ('INSERT INTO `article`(`title`, `intro`, `img_src`, `content`, `keywords`, `description`, `status`, `category_id`, `date_`) VALUES (?,?,?,?,?,?,?,?,?)');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->title);
		$this->stmt -> bindValue(2, $this->intro);
		$this->stmt -> bindValue(3, $this->img_src);
		$this->stmt -> bindValue(4, $this->content);
		$this->stmt -> bindValue(5, $this->keywords);
		$this->stmt -> bindValue(6, $this->description);
		$this->stmt -> bindValue(7, $this->status);
		$this->stmt -> bindValue(8, $this->category_id);
		$this->stmt -> bindValue(9, $this->date_);
		
		$this->stmt -> execute();
	}
	public function aditArticle(){
		$this->sql = ('UPDATE `article` SET 
		`title` = ?,
		`img_src` = ?,
		`intro` = ?,
		`content` = ?,
		`keywords` = ?,
		`description` = ?,
		`status` = ?,
		`category_id` = ?,
		`date_` = ?
		WHERE `id` = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->title);
		$this->stmt -> bindValue(2, $this->img_src);
		$this->stmt -> bindValue(3, $this->intro);
		$this->stmt -> bindValue(4, $this->content);
		$this->stmt -> bindValue(5, $this->keywords);
		$this->stmt -> bindValue(6, $this->description);
		$this->stmt -> bindValue(7, $this->status);
		$this->stmt -> bindValue(8, $this->category_id);
		$this->stmt -> bindValue(9, $this->date_);
		$this->stmt -> bindValue(10, $this->id);
		$this->stmt -> execute();		
	}
	public function inputValue(){
		$this->sql = ('SELECT * FROM `article` WHERE ID = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
		return $this -> stmt -> fetch(PDO::FETCH_ASSOC);
	}
	public function deleteArticle(){
		$this->sql = ('DELETE FROM `article` WHERE ID = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
	}
	public function buildArticle(){
		$this->sql = ('SELECT * FROM `article` WHERE category_id = ? AND status = 1 ORDER BY `date_` DESC LIMIT ?, 3');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->category_id);
		$this->stmt -> bindValue(2, $this->pag, PDO::PARAM_INT);
		$this->stmt -> execute();
		return $this -> stmt -> fetchAll(PDO::FETCH_ASSOC);		
	}
	public function countArticle(){
		$this->sql = ('SELECT * FROM `article` WHERE category_id = ? AND status = 1 ORDER BY `date_` DESC');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->category_id);
		$this->stmt -> execute();
		return count($this -> stmt -> fetchAll(PDO::FETCH_ASSOC));	
	}
	public function buildPost(){
		$this->sql = ('SELECT * FROM `article` WHERE id = ?');
		$this->stmt = BD::conection()->prepare($this->sql);
		$this->stmt -> bindValue(1, $this->id);
		$this->stmt -> execute();
		return $this -> stmt -> fetch(PDO::FETCH_ASSOC);		
	}
	public function lastChange(){
			$this -> article = BD::conection()->query('SELECT `date_` FROM `article` ORDER BY `date_` DESC');
			return $this -> article -> fetchColumn();			
		}	
}
?>