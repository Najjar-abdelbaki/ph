<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp_crud";


$usern = $_POST["username"];
$pwd = $_POST["password"];
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



  $stmt = $conn->prepare("SELECT username, pwd FROM users WHERE username='$usern' and pwd= '$pwd'");
  $stmt->execute();

  // set the resulting array to associative
  $row = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the result row 

  var_dump($row);

  if(empty($usern) || empty($pwd))  
  {  
    echo '<script>alert("All fields are required")</script>';
       echo " '<label>All fields are required</label>'"; 
       
  }


  elseif(empty($row) ){

    echo '<script>alert("Username not exists or password incorrect")</script>';
    echo " '<label>Username not exists or password incorrect</label>'";
  }


  else  
  {  
    session_start();
    $_SESSION["msg"] = "succ";
    header("Location: produit.php?msg=" . urlencode($_SESSION["msg"]));
    exit;
  } 


    








} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>