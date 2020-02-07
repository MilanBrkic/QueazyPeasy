<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <?php
        $url ='http://localhost:8080/queazypeasy/server/select_questions.php';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
        $curl_odgovor = curl_exec($curl);
        curl_close($curl);
        $json_objekat=json_decode($curl_odgovor);
    ?>

        <table>
            <tr>
                <td>Id</td>
                <td>Question</td>
                <td>Ans1</td>
                <td>Ans2</td>
                <td>Ans3</td>
                <td>Ans4</td>
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
    
</body>
</html>