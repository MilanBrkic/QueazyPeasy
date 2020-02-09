<?php

   include_once "../connection.php";
   $db= new Connection("quiz");
   $values=array($_GET['id'],$_GET['question'],$_GET['answer1'],$_GET['answer2'],$_GET['answer3'],$_GET['answer4'],$_GET['correct'],$_GET['type']);
   $db->update("questions",0,$values);
?>