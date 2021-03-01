<?php

session_start();

if (array_key_exists("id", $_SESSION)) {


include ('dbconnection.php');
include ('header.php');


$error = "";

// print_r($_POST);



if (array_key_exists("product", $_POST)){

        if (!$_POST['pcode']) {  
            $error .= "Code is required<br>";   
        }
        if (!$_POST['pname']) {  
            $error .= "Name is required<br>";   
        } 
        if (!$_POST['price']) {  
            $error .= "Price is required<br>";   
        } 
        if (!$_POST['qty']) {  
            $error .= "Quantity is required<br>";   
        }  
        
        if ($error != "") {          
            $error = "<p>There were error(s) in your form:</p>".$error;      
        }else{

            $query = "INSERT INTO `product` (`pcode`,`pname`,`price`,`qty`) VALUES ('".mysqli_real_escape_string($link, $_POST['pcode'])."', '".mysqli_real_escape_string($link, $_POST['pname'])."', '".mysqli_real_escape_string($link, $_POST['price'])."', '".mysqli_real_escape_string($link, $_POST['qty'])."')";

            if (!mysqli_query($link, $query)) {

                $error = "<p>Something went wrong - please try again later.</p>";

            } 
        }
    }
}else{

    header("Location: index.php");
    
}





?>


<html>
    <body>
    <?php echo $error; ?>
        <form method="post">

            <input type="text" name="pcode" placeholder="pcode">
            <input type="text" name="pname" placeholder="pname">
            <input type="text" name="price" placeholder="price">
            <input type="text" name="qty" placeholder="qty">
            <input type="submit" value="enter" name="product">

        </form>

        

        <a href="productinfo.php"><input type="submit" name="product" value="Product Details"></a>

    </body>

</html>