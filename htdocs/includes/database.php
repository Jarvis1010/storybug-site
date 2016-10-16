<?php
class dataBase{
    public $servername="";
    public $username="";
    public $password="";
    public $dbname;
    private $con;

    private function connect(){
       $connect = mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
            // Check connection
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else{
                 return $connect;
            }
    }
   
    public function query($sql){
        if (!mysqli_ping($this->con)) {
            $this->con = $this->connect();
        } 
        
        $result = mysqli_query($this->con,$sql);
        if(is_bool($result)){
            $rows=$result;
        }else{
            $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        
        return $rows;
        
    }
}    	
?>		