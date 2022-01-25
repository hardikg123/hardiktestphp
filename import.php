<?php
    include 'connection.php';
    include 'versioncompare.php';

    $jsonFile="Code Challenge (DEV_Sales_full).json";
    if(!file_exists($jsonFile)) {
      echo 'File not found';
      exit;
    }
    $jsondata = file_get_contents($jsonFile);

    $array_data = json_decode($jsondata, true);

    $a = new database();
    if(!empty($array_data)) {
      foreach ($array_data as $row) {
        $result = $a->insert('customer_products',['sale_id' => $row["sale_id"],'customer_name' => $row["customer_name"],'customer_mail' => $row["customer_mail"],'product_id' => $row["product_id"],'product_name' => $row["product_name"],'product_price' => $row["product_price"],'sale_date' => $vc->versioncompare($row["version"],$row["sale_date"]),'version' => $row["version"]]);
      }
    }
    
    if($result) {
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute";
    }
?>