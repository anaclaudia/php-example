<?php
class Db {
	protected static $conn;

	public function connect() {	
		if(!isset(self::$conn)) {
			$config = parse_ini_file('config.ini');
			self::$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
		}

		if(self::$conn == false) {
			return false;
		}	
		return self::$conn;
	}

	public function query($query) {
		$conn = $this -> connect();
		$result = $conn -> query($query);
		return $result;
	}

	public function select($query) {
		$rows = array();
		$result = $this -> query($query);
		if ($result === false) {
			return false;
		}

		while ( $row = $result -> fetch_assoc()) {
			$rows[] = $row;
      
		}
		return $rows;
	}

	public function error() {
		$conn = $this -> connect();
		return $conn -> error;
	}
}
?>
