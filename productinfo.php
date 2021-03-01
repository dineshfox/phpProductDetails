<?php
session_start();

if (array_key_exists("id", $_SESSION)) {

include ('dbconnection.php');
include ('header.php');

$query = "SELECT * FROM `product` ORDER BY pid";

$result = $link->query($query);

$rownumber=0;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { 
    echo "id: " . $row["pid"]. " - code: " . $row["pcode"]. " - Name " . $row["pname"]. "<br>";

    }
} else {
    echo "0 results";
}

$link->close();

}else{

    header("Location: index.php");
    
}

?>

<a href="enterproduct.php"><input type="submit" name="product" value="Enter Product"></a>