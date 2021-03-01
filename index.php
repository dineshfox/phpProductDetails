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
            
        $error = "<p>There were error(s) in your form:</p>".$error;
        
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


<html>
    <body>
    <a href="register.php"><input type="submit" name="register" value="Register"></a>
    <?php echo $error; ?>
        <form method="post">

            <input type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            <input type="submit" name="login" value="login">

        </form>

        

    </body>

</html>