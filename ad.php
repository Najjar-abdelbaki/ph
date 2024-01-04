
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp_crud";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $name = $_POST["name"]; 
  $marque = $_POST["marque"];
  $prix = $_POST["prix"];
  $qte = $_POST["qte"];
  $etat = $_POST["etat"];

     
    $sql = "INSERT INTO magasin (`name`, marque, prix, qte,etat)
    VALUES ('$name', '$marque', '$prix', '$qte','$etat' )";
  // use exec() because no results are returned
    $conn->exec($sql);
    header("Location: produit.php");
    exit;
 



  




} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
