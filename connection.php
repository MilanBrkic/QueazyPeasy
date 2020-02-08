<?php
class Connection{
    private $hostname="localhost";
    private $username="root";
    private $password="";
    private $dbname;
    private $dblink;
    private $result;

    public function __construct($dbname){
        $this->dbname=$dbname;
        $this->connect();
    }

    public function connect(){
        $this->dblink = new mysqli($this->hostname,$this->username, $this->password, $this->dbname);
        if($this->dblink->connect_errno){
            echo "<script>console.log('Konekcija je neuspesna".$mysqli->connect_error."');</script>";
            // printf("Konekcija je neuspesna: %s\n", $mysqli->connect_error);
            exit();
        }

        $this->dblink->set_charset("utf8");
    }

    function select($table='questions', $column="*",$where=null, $order=null){
        $q = "SELECT ".$column." FROM ".$table;
        if($where!=null)
            $q .=" WHERE ".$where;
        if($order!=null)
            $q .=" ORDER BY ".$order;
    
        if($this->executeQuery($q))
            return true;
        else return false;
    }

    function insert($table,$values){
        if($table=='user'){
            $q="INSERT INTO ".$table."(username, password, email) VALUES ('".$values[0]."','".md5($values[1])."','".$values[2]."')";
        }
        if($table=='questions'){
            $q="INSERT INTO ".$table."(question, answer1, answer2, answer3, answer4, correct, type) VALUES ('".$values[0]."','".($values[1])."','".$values[2]."','".($values[3])."','".($values[4])."','".($values[5])."','".($values[6])."')";
            echo $q;
        }

        if($this->executeQuery($q))
            return true;
        else return false;
        
    }

    function update($table,$row,$values){
        if($table=='user'){
            $q = "UPDATE ".$table." SET ".$row."='".$values[1]."' WHERE username='".$values[0]."'";
        }
     
        
        if($this->executeQuery($q))
            return true;
        else return false;
    }


    function executeQuery($query){
        if($this->result = $this->dblink->query($query)){
            // echo "<script>console.log('izvrsen:".$query."');</script>";
            // echo "Izvrsen",$query;
            return true;
        }
        else{
            // echo "NEizvrsen", $query;
            echo "<script>console.log('Neuspesan upit');</script>";
            return false;
        }
    }

    function getResult(){
        return $this->result;
    }
}

?>
