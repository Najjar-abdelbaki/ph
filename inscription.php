
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp_crud";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $fname = $_POST["fname"]; 
  $lname = $_POST["lname"];
  $username = $_POST["username"];
  $password = $_POST["password"];


  //Check if username exists
  $sql = "SELECT COUNT(username) AS num FROM users WHERE username ='$username'";
  $stmt = $conn->prepare($sql);  // Prepare the statement
  $stmt->execute();              // Execute the query
  $row = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch the result row 

  if($row['num'] > 0){
    echo '<script>alert("Username already exists")</script>';
    
  }


  if(empty($fname) || empty($lname) || empty($username) || empty($password))  
  {  
       echo " '<label>All fields are required</label>'"; 
       
  }  
  else  
  {  
    $sql = "INSERT INTO users (firstname, lastname, username, pwd)
    VALUES ('$fname', '$lname', '$username', '$password' )";
  // use exec() because no results are returned
    $conn->exec($sql);
    header("Location: home.html");
    exit;
  }  




  




} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
