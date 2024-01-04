<?php
session_start();


$id = $_POST['id'];
$name = $_POST['name'];
$marque = $_POST['marque'];
$prix = $_POST['prix'];
$qte = $_POST['qte'];
$etat = $_POST['etat'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp_crud";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $stmt = $conn->prepare("UPDATE magasin
    SET `name`='$name', `marque`='$marque', `prix`='$prix', `qte`='$qte', `etat`='$etat'
    WHERE id='$id'");
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




