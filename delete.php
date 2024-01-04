<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp_crud";

$id = $_GET['id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $stmt = $conn->prepare("DELETE FROM magasin
    WHERE id=$id");
    $stmt->execute();
    // set the resulting array to associative
    
  // var_dump($row[0]["id"]);

  header("Location: produit.php");
  exit;



} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  ?>




