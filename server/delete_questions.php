<?php

   include_once "../connection.php";
   $db= new Connection("quiz");
   $id=$_GET['id'];
   $db->delete("questions",$id);
?>