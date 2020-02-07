<?php  
    include_once 'connection.php';
    $db = new Connection('quiz');
    $error = "";
    $success="";
    $click = "";
    if(isset($_POST['signup'])){
        if(empty($_POST['username'])){
            $error="Enter your username";
        }
        else if(empty($_POST['email'])){
            $error="Enter your email";
        } 
        else if(empty($_POST['password'])){
            $error="Enter your password";
        }
        else{
            //USERNAME VALIDATION
            $username = $_POST['username'];
            $where = "username='$username' LIMIT 1";
            $db->select("user","*",$where);
            $row = mysqli_fetch_assoc($db->getResult());
            $num = mysqli_num_rows($db->getResult());
            if($num>0){
                $error = "Username already taken";
            }
            else{
                //EMAIL VALIDATION
                $email = $_POST['email'];
                $where = "email='$email' LIMIT 1";
                $db->select("user","*",$where);
                $row = mysqli_fetch_assoc($db->getResult());
                $num = mysqli_num_rows($db->getResult());
                if($num>0){
                    $error = "Email already taken";
                }
                else{
                    //PASSWORD VALIDATION
                   $password = $_POST['password'];
                   if(strlen($password)<=5){
                        $error="Password weak";
                   }
                   else{
                        $db->insert("user", array($username,$password,$email));
                        $success ="Great! Registration successful. ";
                        $click="Click here to sign in";
                   }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
        <br> Register with QueazyPeasy
    </div>
    <div class="row">
            <div class="col xl-5">
                
            </div>
            <div class="col xl-2" id="error">
                <p><?php echo $error?></p>  
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
                    Email: <br>
                    <input id="email" size="37%" type="text" placeholder="Enter your email" name="email"> <br>
                    Password:<br>
                    <input size="37%" type="password" placeholder="Enter your password" name="password"><br>
                    <input type="submit" value="Sign up " class="btn btn-primary " id="buton" name='signup'>
                </form>
            </div>


            <div class="col xl-5">
                
            </div>
        </div>

        <div class="row">
            <div class="col xl-5">
                
            </div>
            <div class="col xl-2" id="success">
                <p><?php echo $success?><a href="index.php"><?php echo $click?></a></p>  
            </div>


            <div class="col xl-5">
                
            </div>
        </div>

        

       

        
        
        
    </div>

</body>
</html>