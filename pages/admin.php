<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="SHORTCUT ICON" href="../logo/user.ico" type="image/x-icon" />
    <link rel="ICON" href="../logo/user.ico" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
    <div id="refresh">
    <?php
        $url ='http://localhost/queazypeasy/server/select_questions.php';
       include_once "../curl.php";
       $curl_obj=curl($url);
       $json_objekat=json_decode($curl_obj);
    ?>
        <table id="admin_table">
            <tr>
                <td>Id</td>
                <td onclick="sort()" id="question">Question</td>
                <td>Answer1</td>
                <td>Answer2</td>
                <td>Answer3</td>
                <td>Answer4</td>
                <td>Correct</td>
                <td>Type</td>
            </tr>
            <?php
            foreach($json_objekat as $vrednost){
            ?>
            <tr>
                <td><?php echo $vrednost->id;?></td>
                <td><?php echo $vrednost->question;?></td>
                <td><?php echo $vrednost->answer1;?></td>
                <td><?php echo $vrednost->answer2;?></td>
                <td><?php echo $vrednost->answer3;?></td>
                <td><?php echo $vrednost->answer4;?></td>
                <td><?php echo $vrednost->correct;?></td>
                <td><?php echo $vrednost->type;?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
    <div class="row">
    <div class="col-xl-4">
        <form id="insert" method="post">
        <p id="insert_txt"><b>Insert</b></p>
            Question: <br>
            <input type="text" name="question" placehoder="Enter question here"> <br>
            Answer1:<br>
            <input type="text" name="answer1" placehoder="Enter answer1 here"> <br>
            Answer2:<br>
            <input type="text" name="answer2" placehoder="Enter answer2 here"> <br>
            Answer3:<br>
            <input type="text" name="answer3" placehoder="Enter answer3 here"> <br>
            Answer4:<br>
            <input type="text" name="answer4" placehoder="Enter answer4 here"> <br>
            Number of correct answer:<br>
            <input type="text" name="correct" placehoder="Enter correct answer here"> <br>
            Type of question:<br>
            <input type="text" name="type" placehoder="Enter type here"> <br>
            <input type="submit" id="buton" value="Insert" name="button_insert" >
        </form>
</div>
<div class="col-xl-4">
        <form id="update" method="post">
        <p id="update_txt"><b>Update</b></p>
            Id: <br>
            <input type="text" name="id_update" placehoder="Enter id here"> <br>
            Question: <br>
            <input type="text" name="question_update" placehoder="Enter question here"> <br>
            Answer1:<br>
            <input type="text" name="answer1_update" placehoder="Enter answer1 here"> <br>
            Answer2:<br>
            <input type="text" name="answer2_update" placehoder="Enter answer2 here"> <br>
            Answer3:<br>
            <input type="text" name="answer3_update" placehoder="Enter answer3 here"> <br>
            Answer4:<br>
            <input type="text" name="answer4_update" placehoder="Enter answer4 here"> <br>
            Number of correct answer:<br>
            <input type="text" name="correct_update" placehoder="Enter correct answer here"> <br>
            Type of question:<br>
            <input type="text" name="type_update" placehoder="Enter type here"> <br>
            
            <input type="submit" id="buton" value="Update" name="button_update" >
        </form>


</div>
<div class="col-xl-4">
        <form id="insert" method="post">
        <p id="delete_txt"><b>Delete</b></p>
            Id: <br>
            <input type="text" name="id_delete" placehoder="Enter id here"> <br>
            
            <input type="submit" id="buton" value="Delete" name="button_delete" >
        </form>
        
        </div>
        
        </div>
        <?php

            function notempty($str){
                if($str==''){
                    return false;
                }
                else return true;
            }
        //insert
        if(isset($_POST['button_insert'])){
            if(notempty($_POST['question']) && notempty($_POST['answer1']) && notempty($_POST['answer2']) && 
            notempty($_POST['answer3']) && notempty($_POST['answer4']) && notempty($_POST['correct']) && notempty($_POST['type'])){

                $url2='http://localhost/queazypeasy/server/insert_questions.php?question='.urlencode($_POST['question']).'&answer1='.$_POST['answer1'].'&answer2='.$_POST['answer2'].'&answer3='.$_POST['answer3'].'&answer4='.$_POST['answer4'].'&correct='.$_POST['correct'].'&type='.$_POST['type'];

                echo curl($url2);
                echo "<meta http-equiv='refresh' content='0.1'>";
            }

            
            
        }
        //update
        

        if(isset($_POST['button_update'])){
            if(notempty($_POST['id_update']) && notempty($_POST['question_update']) && notempty($_POST['answer1_update']) && notempty($_POST['answer2_update']) && 
            notempty($_POST['answer3_update']) && notempty($_POST['answer4_update']) && notempty($_POST['correct_update']) && notempty($_POST['type_update'])){

                $url2='http://localhost/queazypeasy/server/update_questions.php?id='.$_POST['id_update']."&question=".urlencode($_POST['question_update']).'&answer1='.$_POST['answer1_update'].'&answer2='.$_POST['answer2_update'].'&answer3='.$_POST['answer3_update'].'&answer4='.$_POST['answer4_update'].'&correct='.$_POST['correct_update'].'&type='.$_POST['type_update'];
                echo $url2;
                echo curl($url2);
                echo "<meta http-equiv='refresh' content='0.1'>";
            }
            
        }

        if(isset($_POST['button_delete'])){
            if(notempty($_POST['id_delete'])){
                $url3='http://localhost/queazypeasy/server/delete_questions.php?id='.$_POST['id_delete'];
                echo $url3;
                echo curl($url3);
                echo "<meta http-equiv='refresh' content='0.1'>";
            }
            
        }
        
        ?>
   <script src="../js/sort.js"></script>
</body>
</html>