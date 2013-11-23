<?php
class Database {
	public $mysqli;
    public static $_instance = NULL;
	
	function __construct(){
		$mysqliData = new mysqli("localhost", "root", "rootpassword", "integrador");
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		$this->mysqli = $mysqliData;
	}	
	
    public static function getInstance() {
		if (self::$_instance == null) {
            self::$_instance = new Database();
        }
		
        return self::$_instance;
		
    }
	function __destruct(){
		$this->mysqli->close(); 
	}
	function consultaSelect($query) {
		$result = NULL; 
		if ($stmt = $this->mysqli->prepare($query)) { 
			$stmt->execute(); 
			
			$meta = $stmt->result_metadata(); 
			while ($field = $meta->fetch_field()) 
			{ 
				$params[] = &$row[$field->name]; 
			} 
			call_user_func_array(array($stmt, 'bind_result'), $params); 
			while ($stmt->fetch()) { 
				foreach($row as $key => $val) 
				{ 
					$c[$key] = $val; 
				} 
				$result[] = $c; 
			} 
			$stmt->close(); 
		}else{
			echo "Error en Query<br/>";
			echo $query ;
		}
		return $result;
	}
	
	function query($query){
	    if ($stmt = $this->mysqli->prepare($query)) { 
			$stmt->execute();
            $meta = $stmt->result_metadata();
            $stmt->close();
		}else{
			echo "Error en Query<br/>";
			echo $query;
		}
	}
}