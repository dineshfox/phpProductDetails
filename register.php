<?php


include ('dbconnection.php');
include ('header.php');

$error = "";

// print_r($_POST);

if (array_key_exists("register", $_POST)){

    if (!$_POST['name']) {
            
        $error .= "name  is required<br>";
        
    } 
    
    if (!$_POST['username']) {
        
        $error .= "username is required<br>";
        
    } 
    if (!$_POST['password']) {
        
        $error .= "password is required<br>";
        
    } 
    if (!$_POST['email']) {
        
        $error .= "email is required<br>";
        
    } 

    if ($error != "") {
            
        // $error = "<p>There were error(s) in your form:</p>".$error;
        $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        
    }else{


        $query = "SELECT id FROM `users` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";

        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {

            $error = "That username is taken.";

        } else {

            $query = "INSERT INTO `users` (`name`,`username`,`password`,`email`) VALUES 
            ('".mysqli_real_escape_string($link, $_POST['name'])."','".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."','".mysqli_real_escape_string($link, $_POST['email'])."')";

            if (!mysqli_query($link, $query)) {

                $error = "<p>Something went wrong - please try again later.</p>";

            }else{
                header("Location: index.php");
            }
        }
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

    <title>Hello, world!</title>
  </head>
  <body>
    

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-4">

                <form method="post">
                    <h4>Register</h4>
                    <?php echo $error; ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" placeholder="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Username</label>
                        <input type="text" name="username" placeholder="username" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="text" name="email" placeholder="email" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
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