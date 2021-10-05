<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $prod_id = (int)$_POST["proId"];
    }
    $servername = "<host-address>";
    $username = "<username>";
    $password = "<password>";
    $dbname = "<db-name>";  
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT DISTINCT MAX(sell_price_3),stocks.prod_id,product_registry.prod_name FROM stocks INNER JOIN product_registry ON stocks.prod_id = product_registry.prod_id WHERE product_registry.prod_id=$prod_id";
    $result = $conn->query($sql);
      // output data of each row
      while($row=$result->fetch_assoc()){
        echo $prod_id,"#";
        echo $row['MAX(sell_price_3)'],"#";
        echo $row['prod_name'],"#";
      }
    
    $conn->close();
?>