<?php 
	include_once 'db-connect.php';
	class DB
	{
        
		private $host   = "localhost";
		private $user   = "root";
		private $pass   = "";
		private $dbname = "com";


		public $link;
		public $error;

		public function __construct()
		{
			$this->connectDB();
		}

		private function connectDB()
		{
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if (!$this->link) {
				echo "Connection fail".$this->link->connect_error;
				return false;
			}
		}

		// Insert Data
		public function insert($query)
		{
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($insert_row) {
				return $insert_row;

				$sql_noti=$this->link->query("INSERT INTO notification VALUES(null,'$this->id','$this->name','Comment',now(),0)");
            	

			} else {
				return false;
			}
		}

		// Select or Read data
		public function select($query)
		{
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			} else {
				return false;
			}
		}
	}
 ?>