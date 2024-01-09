<?php
session_start();
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My crud App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div class="Section_top">

        <div class="container">
          <div class="box">
        <?php
        if (isset($_SESSION["msg"])){

      
           $servername = "localhost";
           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "dp_crud";



          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



            $stmt = $conn->prepare("SELECT * FROM magasin");
            $stmt->execute();
            // set the resulting array to associative
            $rows = $stmt->fetchAll();  // Fetch the result row 
            //var_dump($row['name']);
        ?>

                      <table class="table table-striped">
                                      <thead>
                                          <tr>
                                          <th scope="col">id</th>
                                          <th scope="col">Product Name</th>
                                          <th scope="col">marque</th>
                                          <th scope="col">Prix</th>
                                          <th scope="col">Qte</th>
                                          <th scope="col">etat (en promo)</th>

                                          <th scope="col">Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          foreach ($rows as $row) {

                                            echo "<tr>";
                                            echo "<td>$row[id]</td>";
                                            echo "<td>$row[name]</td>";
                                            echo "<td>$row[marque]</td>";
                                            echo "<td>$row[prix]</td>";
                                            echo "<td>$row[qte]</td>";
                                            echo "<td>$row[etat]</td>";
                                            echo '<td>
                                                    <a href="update.php?id=' . $row['id'] . '" class="btn btn-success">Update</a>
                                                    <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                                                    </td>';






                                            echo "</tr>";


                                          }




                                              } catch(PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                              }
                                              $conn = null;
                                              echo "</table>";
                                              ?>
                                      </tbody>
                                      <div class="link-right">
                                          <a href="add.html" class="link-primary">Add Product</a>
                                      </div>
                                      
                                      <div  style="text-align: left;">
                                            <a href="home.html" class="btn btn-danger">Deconnection</a>
                                      </div>






                    
          </div>                                        




                

        </div>


        <?php
        }else{
        
          header("Location: home.html");
          exit;

        }
        ?>
        




















    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </body>
</html>