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
