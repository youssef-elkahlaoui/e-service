<?php
class Database
{
	public function connect()
	{
		$string = DBDRIVER . ":host=".DBHOST.";dbname=".DBNAME;
		if(!$con = new PDO($string,DBUSER,DBPASS)){
			die("could not connect to database");
		}
		return $con;
	}


	public function query($query, $data = array(), $data_type = "object") {
		$con = $this->connect();
		$stm = $con->prepare($query);
		if ($stm) {
			$check = $stm->execute($data);
			if ($check) {
				if (stripos($query, 'SELECT') === 0) {
					
					if ($data_type == "object") {
						$data = $stm->fetchAll(PDO::FETCH_OBJ);
					} else {
						$data = $stm->fetchAll(PDO::FETCH_ASSOC);
					}
					if (is_array($data) && count($data) > 0) {
						return $data;
					}
				} else {
					return true;
				}
			}
		}
		return false;
	}	
}