<?php
    include_once '../connection.php';
    $db=new Connection('quiz');
    $keyword = $_GET['keyword'];
    $db->select("questions","*", "question LIKE '%".$keyword."%'");
    $arr = array();
    while($row = mysqli_fetch_assoc($db->getResult())){
        $arr[] = $row;
    }

    $arr_json = json_encode($arr);
    print($arr_json);
?>