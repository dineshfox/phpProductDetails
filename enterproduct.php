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
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';     
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
    
  <a href="productinfo.php"><input type="submit" name="product" value="Product Details"></a>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-4">

                <form method="post">
                    <h4>Register</h4>
                    <?php echo $error; ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Code</label>
                        <input type="text" name="pcode" placeholder="pcode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Product Name</label>
                        <input type="text" name="pname" placeholder="pname" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price</label>
                        <input type="text" name="price" placeholder="price" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantity</label>
                        <input type="text" name="qty" placeholder="qty" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="product" class="btn btn-primary">Enter Product</button>
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