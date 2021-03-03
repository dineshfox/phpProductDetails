<?php

session_start();

include ('dbconnection.php');

$error = "";

// print_r($_POST);

if (array_key_exists("logout", $_GET)) {
        
    unset($_SESSION);    
    session_destroy();
    header("Location: index.php");

}elseif (array_key_exists("login", $_POST)){

    // $query = "INSERT INTO `product` (`pcode`,`pname`,`price`,`qty`) VALUES ('".mysqli_real_escape_string($link, $_POST['pcode'])."', '".mysqli_real_escape_string($link, $_POST['pname'])."', '".mysqli_real_escape_string($link, $_POST['price'])."', '".mysqli_real_escape_string($link, $_POST['qty'])."')";

    // if (!mysqli_query($link, $query)) {

    //     $error = "<p>Something went wrong - please try again later.</p>";

    // } 

    if (!$_POST['username']) {
            
        $error .= "An email address is required<br>";
        
    } 
    
    if (!$_POST['password']) {
        
        $error .= "A password is required<br>";
        
    } 

    if ($error != "") {
            
        // $error = "<p>There were error(s) in your form:</p>".$error;
        $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        
    }else{

    
        $query = "SELECT * FROM `users` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."'";
                
        $result = mysqli_query($link, $query);
    
        $row = mysqli_fetch_array($result);
                    
        if (isset($row)) {

            $hashedPassword = $row['password'];
            
            if ($hashedPassword==$_POST['password']){

                // echo ($newid);

                $userid = $row['id'];
                $_SESSION['id'] = $userid;

                header("Location: productinfo.php");

            }else{
                $error = "That email/password combination could not be found.";
            }

        }else{
            $error = "That email/password combination could not be found.";

        }
    
    // echo ('print this to test');
    }

}




?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bg {
        /* The image used */
        background-image: url("background.jpg");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style> -->

    <title>Hello, world!</title>
  </head>
  <body>

  <div class="bg">
    <div class="container">
        <a href="register.php"><input type="submit" name="register" value="Register"></a>
        <div class="row justify-content-md-center">
            <div class="col col-md-4">


                <form method="post" style="padding-top:20%;">
                    <h4>Log In</h4>

                    <?php echo $error; ?>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input type="text" name="username" placeholder="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Log me in</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Log In</button>
                </form>

            </div> 
        </div> 
    </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>