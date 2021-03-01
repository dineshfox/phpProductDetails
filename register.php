<?php


include ('dbconnection.php');
include ('header.php');

$error = "";

// print_r($_POST);

if ($_POST) {

    $query = "SELECT id FROM `users` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";

    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {

        $error = "That username is taken.";

    } else {

        $query = "INSERT INTO `users` (`username`,`password`) VALUES ('".mysqli_real_escape_string($link, $_POST['username'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

        if (!mysqli_query($link, $query)) {

            $error = "<p>Something went wrong - please try again later.</p>";

        }else{
            header("Location: index.php");
        }
    }
}


?>


<html>
    <body>
        <form method="post">

            <input type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            <input type="submit" name="register" value="Register">

        </form>

        <?php echo $error; ?>

    </body>

</html>