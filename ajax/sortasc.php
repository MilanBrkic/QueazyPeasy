<?php
        $url ='http://localhost/queazypeasy/server/select_questions_asc.php';
       include_once "../curl.php";
       $curl_obj=curl($url);
       $json_objekat=json_decode($curl_obj);
    ?>
        <table id="admin_table">
            <tr>
                <td>Id</td>
                <td onclick="sort()" id="question">Question ▼</td>
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