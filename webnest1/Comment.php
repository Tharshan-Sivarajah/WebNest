<?php 
	
	include_once 'DB.php';
	
	class Comment
	{
		private $db;
		private $name;
		private $comment;
		private $table = "com";
		
		public function __construct()
		{
			$this->db = new DB();
		}

		public function setData($name, $comment,$cid)
		{
			$this->name    = $name;
			$this->comment = $comment;
			$this->id = $cid;
			
		}

		public function create()
		{
			$query = "INSERT INTO $this->table VALUES(null,'$this->id','$this->name', '$this->comment',now())";
			$insert_comment = $this->db->insert($query);
			return $insert_comment;
			
		}

		public function index()
		{
			$query = "SELECT u.Name ,up.image ,c.comments,c.p_id
						FROM com AS c INNER JOIN users AS u 
						ON c.c_user_id= u.user_id INNER JOIN user_profile_pic AS up 
						ON u.user_id= up.user_id INNER JOIN post AS p
						ON p.post_id= c.p_id ORDER BY com_id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function dateFormat($data)
		{
			date_default_timezone_set('Asia/Dhaka');
			$date = date('M j, h:i:s a', time());
			return $date;
		}

		public function com_count()
		{
			$query = "SELECT p_id,COUNT(com_id) AS 'count' FROM $this->table GROUP BY p_id";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>