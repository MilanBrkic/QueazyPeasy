<?php
    include_once '../connection.php';
    $db = new Connection('quiz');
    session_start();
    if(isset($_POST['score'])){
        $score  = $_POST['score'];
        if($score>$_SESSION[$_SESSION['score']]){
            $db->update('user', $_SESSION['score'], array($_SESSION['username'], $score));
            $_SESSION[$_SESSION['score']] = $score;
        }
    }
?>