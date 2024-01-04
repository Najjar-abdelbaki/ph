<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dp_crud";

$id_update = $_GET['id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $stmt = $conn->prepare("SELECT * FROM magasin WHERE id = '$id_update'");
    $stmt->execute();
    // set the resulting array to associative
    $row = $stmt->fetchAll();  // Fetch the result row 
    
  // var_dump($row[0]["id"]);



?>



<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="Section_top">

		<div class="container">
			<form action="up.php" 
				method="post">
				
			<h4 class="display-4 text-center">Update</h4><hr><br>
			
			<div class="form-group">
				<label for="name">Name</label>
				<input type="name" 
					class="form-control" 
					id="name" 
					name="name" 
					value=<?=$row[0]['name']?>>
			</div>

			<div class="form-group">
				<label for="marque">Marque</label>
				<input type="marque" 
					class="form-control" 
					id="marque" 
					name="marque" 
					value="<?=$row[0]['marque'] ?>" >
			</div>

			<div class="form-group">
				<label for="prix">prix</label>
				<input type="prix" 
					class="form-control" 
					id="prix" 
					name="prix" 
					value="<?=$row[0]['prix'] ?>" >
			</div>

			<div class="form-group">
				<label for="qte">qte</label>
				<input type="qte" 
					class="form-control" 
					id="qte" 
					name="qte" 
					value="<?=$row[0]['qte'] ?>" >
			</div>

            <div class="form-group">
				<label for="etat">etat</label>
				<input type="etat" 
					class="form-control" 
					id="etat" 
					name="etat" 
					value="<?=$row[0]['etat'] ?>" >
			</div>

			<input type="text" 
					name="id"
					value="<?=$row[0]['id']?>"
					hidden >

			<button type="submit" 
					class="btn btn-primary"
					name="update">Update</button>
				
			</form>
        <?php
        } catch(PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                              }
                                              $conn = null;
                                              ?>


		</div>
	</div>
</body>
</html>









