<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="SHORTCUT ICON" href="../logo/user.ico" type="image/x-icon" />
    <link rel="ICON" href="../logo/user.ico" type="image/ico" />
    <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
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
                <td>Question</td>
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

        <?php

            function notempty($str){
                if($str==''){
                    return false;
                }
                else return true;
            }

        if(isset($_POST['button_insert'])){
            if(notempty($_POST['question']) && notempty($_POST['answer1']) && notempty($_POST['answer2']) && 
            notempty($_POST['answer3']) && notempty($_POST['answer4']) && notempty($_POST['correct']) && notempty($_POST['type'])){

                $url2='http://localhost/queazypeasy/server/insert_questions.php?question='.$_POST['question'].'&answer1='.$_POST['answer1'].'&answer2='.$_POST['answer2'].'&answer3='.$_POST['answer3'].'&answer4='.$_POST['answer4'].'&correct='.$_POST['correct'].'&type='.$_POST['type'];

                echo curl($url2);
                echo "<meta http-equiv='refresh' content='0.1'>";
            }
        }

        
        ?>
   
</body>
</html>