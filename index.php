<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: pages/main.php");
    }
    include_once 'connection.php';
    $db = new Connection('quiz');
    $error = "";
    if(isset($_POST['signin'])){
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $username = stripslashes($username);
        $password = stripslashes($password);
        $password = md5($password);
        
            
        $where="username='$username' LIMIT 1";
        $db->select('user',"*", $where);
        $row = mysqli_fetch_assoc($db->getResult());
        $num = mysqli_num_rows($db->getResult());
        
        try {
            if($num == 0){
                $error = 'Incorrect username or password';
            
            }
            else{
                $db_username = $row['username'];
                $db_password = $row['password'];
                $general = $row['score_general'];
                $geo = $row['score_geo'];
                $math = $row['score_math'];
                $history = $row['score_history'];
                $art = $row['score_art'];
                $sport = $row['score_sport'];
                $admin = $row['admin'];

                // echo $db_password," ",$password;

                if($db_password==$password){
                    $_SESSION['username']=$username;
                    $_SESSION['score_general'] = $general;
                    $_SESSION['score_geo'] = $geo;
                    $_SESSION['score_math'] = $math;
                    $_SESSION['score_history'] = $history;
                    $_SESSION['score_art'] = $art;
                    $_SESSION['score_sport'] = $sport;
                    $_SESSION['admin'] = $admin;
                    header("Location: pages/main.php");
                }
                else{
                    $error = 'Incorrect username or password';
                }
            }
        } catch (Exception $e) {
            
        }
        
        
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="324862117620-5oer3d0hlvrc23v9quh95cj4g08bt7r1.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
    <link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon" />
    <link rel="ICON" href="favicon.ico" type="image/ico" /> 
    
    <title>QueazyPeasy</title>
</head>
<body>
    <div class="centar">
        <img src="logo/qplogowhite.png" alt="logo">
        
        
    </div>

    <div class="signin centar">
        <br> Sign in to QueazyPeasy
    </div>
    <div class="row">
            <div class="col xl-5">
                
            </div>
            <div class="col xl-2" id="error">
                <p><?php echo $error ?></p>  
            </div>


            <div class="col xl-5">
                
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col xl-5">
                
            </div>
            <div class="col xl-2" id="box">
                <form method="post" enctype="multipart/form-data">
                    Username: <br>
                    <input id="username" size="37%" type="text" placeholder="Enter your username" name="username"> <br>
                    Password:<br>
                    <input size="37%" type="password" placeholder="Enter your password" name="password"><br>
                    <input type="submit" value="Sign in " class="btn btn-primary " id="buton" name='signin'>
                </form>
            </div>


            <div class="col xl-5">
                
            </div>
        </div>

        

        <div class="row">
            <div class="col xl-5">
                
            </div>
            <div class="col xl-2 google">
                <div class="google-btn" data-onsuccess="onSignIn">
                    <div class="google-icon-wrapper">
                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                    </div data-onsuccess="onSignIn">
                        <p class="btn-text"><b>Sign in with google</b></p>
                    </div>
            </div>


            <div class="col xl-5">
                
            </div>
        </div>

        <div class="row">
            <div class="col xl-5">
                
            </div>
            <div class="col xl-2" id="newto">
                <p>New to QueazyPeasy? <a href="register.php">Create an account</a>.</p>  
            </div>


            <div class="col xl-5">
                
            </div>
        </div>
        
        
    </div>

    
    
</body>
</html>