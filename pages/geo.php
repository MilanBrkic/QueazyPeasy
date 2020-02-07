<?php
    
    session_start();
    $_SESSION['score'] = 'score_geo';
    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['signout'])){
        session_destroy();
        header("Location: ../index.php");
    }

    if(isset($_POST['admin'])){
        header("Location: admin.php");
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/mainstyle.css">
    <link rel="SHORTCUT ICON" href="../favicon.ico" type="image/x-icon" />
    <link rel="ICON" href="../favicon.ico" type="image/ico" />
    <title>QueazyPeasy</title>
    
    <?php
        include_once '../connection.php';
        $database = new Connection('quiz');
        $database->select('questions','*',"type='geo'");
        $rows=array();
        while($r = mysqli_fetch_assoc($database->getResult())){
            $rows[]=$r;
        }

        
        $fp = fopen('data.json', 'w');
        fwrite($fp, json_encode($rows));
        fclose($fp);
        
    ?>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10">
                    
               
                <a href="main.php"><img id="qplogo" src="../logo/qplogowhite.png"></a> 

                </div>
                <div class="col-xl-2">
                    <div class="row">
                        <p class="hello">Hello, <span id="username"><?php echo $_SESSION['username'] ?></span></p>
                    </div>
                    <form method="post">
                        <div class="row">
                                <input type="submit" name="signout" value="Sign Out" id="signout">
                        </div>

                        <div class="row">
                            <?php
                                if($_SESSION["admin"]==1){
                                    echo "<input type='submit' name='admin' value='Admin options' id='admin'>";
                                }
                            ?>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row" id="glrow">
            <div class="col-xl-2 col-md-2 side">
                <div>
                    <ul>
                        <li><b>Choose a category:</b></li>
                        <li><a href="main.php">General</a></li>
                        <li><b><a href="geo.php">Geography</a></b></li>
                        <li><a href="history.php">History</a></li>
                        <li><a href="art.php">Art</a></li>
                        <li><a href="sport.php">Sport</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-xl-8 col-md-8 ">
                <div class="kontejner">
                    <div class="pitanje">
                    
                        <p id="question">Press Start</p>
                    
                    </div>
                    <div id="answer-buttons" class="btn-grid">

                        <div class="div_btn">    
                          <button class="btn" id="answer1"></button>
                        </div>
                        <div class="div_btn">
                            <button class="btn" id="answer2"></button>
                        </div>
                          
                        
                        <div class="div_btn">
                          <button class="btn" id="answer3"></button>
                        </div>
                        <div class="div_btn">
                            <button class="btn" id="answer4"></button>
                        </div>
                          
                        
                    </div>

                    <div class="controls">
                        <div>
                            <button id="start-btn" class="start-btn btn" onclick="Start()">Start</button>
                        </div>
                        
                        
                        <div class="next_div">
                            <button id="next-btn" class="next-btn btn hide" onclick="Next()">Next</button>
                        </div>
                        
                    </div>
                    <div>
                            <button id="playa-btn" class="playa-btn btn hide" onclick="PlayAgain()">Play again</button>
                        </div>
                    
                </div>


                

            </div>


            <div class="col-xl-2 col-md-2 side">
                <p>Category: <span id="category">Geography</span> </p>
                <p>High-score: <span id="high-score"></span><?php echo $_SESSION[$_SESSION['score']] ?>/<span id="out-of"></span></p>
                <p>Current Score:
                     <span id="score"></span>/<span id="out-of2"></span></p>

            </div>
        </div>
        <div id="test">
            
        </div>
        
        
    </div>

<script src="../js/script.js"></script>
    
</body>
</html>