<?php


include ('dbconnection.php');

$error = "";

print_r($_POST);

if ($_POST) {

    $query = "INSERT INTO `product` (`pcode`,`pname`,`price`,`qty`) VALUES ('".mysqli_real_escape_string($link, $_POST['pcode'])."', '".mysqli_real_escape_string($link, $_POST['pname'])."', '".mysqli_real_escape_string($link, $_POST['price'])."', '".mysqli_real_escape_string($link, $_POST['qty'])."')";

    if (!mysqli_query($link, $query)) {

        $error = "<p>Something went wrong - please try again later.</p>";

    } 
}




?>


<html>
    <body>
        <form method="post">

            <input type="text" name="pcode" placeholder="pcode">
            <input type="text" name="pname" placeholder="pname">
            <input type="text" name="price" placeholder="price">
            <input type="text" name="qty" placeholder="qty">
            <input type="submit" value="enter">

        </form>

        <?php echo $error; ?>

    </body>

</html>