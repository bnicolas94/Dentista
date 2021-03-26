<?php
    require('config.php');
    class Conexion{
		
		protected  $conexion_db;
        public function Conexion(){
			$conexion_db =$this->conexion_db= new mysqli(HOST, USER, PASS, DB_NAME);  
			
	
		if($this->conexion_db->connect_errno){
				echo "Error:" . $this->conexion__db->connect_error;
                return;
				}
					
			}
			
		public function query($sql){
			return mysqli_query($this->conexion_db,$sql);
		}
		public function rows($sql) {
		  return mysqli_num_rows($sql);
		}
	  
		public function liberar($sql) {
		  return mysqli_free_result($sql);
		}
	  
		public function recorrer($sql) {
		  return mysqli_fetch_assoc($sql);
		}
		
		
		
	}
?>