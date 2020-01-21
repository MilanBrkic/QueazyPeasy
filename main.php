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
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    <title>QueazyPeasy</title>
    
    <?php
        include_once 'connection.php';

        $database = new Connection('quiz');
        $database->select();
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
                    <img id="qplogo" src="logo/qplogowhite.png">
                </div>
                <div class="col-xl-2">
                    <div class="row">
                        <p class="hello">Hello <span id="username">user</span></p>
                    </div>
                    <div class="row">
                        
                        <p class="hello">ovde ide slika</p>
                    </div>
                   
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
                        <li>General</li>
                        <li>Geography</li>
                        <li>Math</li>
                        <li>History</li>
                        <li>Art</li>
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
                    
                </div>


                
                <!-- <div class="containerq">
                    <div id="question-container" class="hide">
                        <div class="row" id="questionid">
                            <div id="questions">Questionmmmmmmmmmmmmmmmmmmmmmmm</div>
                        </div>
                     
                      <div id="answer-buttons" class="btn-grid">

                          <div class="row">    
                            <button class="btn">Answer 1</button>
                            <button class="btn">Answer 2</button>
                          </div>
                          <div class="row">
                            <button class="btn">Answer 3</button>
                            <button class="btn">Answer 4</button>
                          </div>
                      </div>
                      <div class="controls">
                      <div class="row">
                        
                            <div class="col-xl-6">
                                <button id="start-btn" class="start-btn btn  ">Start</button>
                            </div>  
                            <div class="col-xl-6">
                                <button id="next-btn" class="next-btn btn hide">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                  </div> -->
            </div>


            <div class="col-xl-2 col-md-2 side">
                <p>Category: <span id="category"></span> </p>
                <p>High-score: <span id="high-score"></span>/<span id="out-of"></span></p>
                <p>Current Score:
                     <span id="score"></span>/<span id="out-of2"></span></p>

            </div>
        </div>

        
        
    </div>

<script src="js/script.js"></script>
    
</body>
</html>