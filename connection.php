<?php 
    class database{
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='dbtestproduct';
        private $result=array();
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if ($this->mysqli->connect_error) {
				die("Connection failed: " . $this->mysqli->connect_error);
			}
        }

        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            if(!empty($para)) {
	            foreach($para as $k => $v) {
				    $para[$k] = mysqli_real_escape_string($this->mysqli,$v);
				}
			}
            $table_value = implode("','", $para);

            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

            $result = $this->mysqli->query($sql) or die($this->mysqli->error);
            if($result) {
            	return true;
            } else {
            	return false;
            }
        }

        public $sql;

        public function select($table,$rows,$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }
            $result = $this->mysqli->query($sql);
            return $result;
        }

        public function __destruct(){
            $this->mysqli->close();
        }
    }
?>