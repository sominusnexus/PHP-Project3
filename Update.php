<?php
    require_once('ITaskManager.php');
    require_once('TaskManager.php');
?>    

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Update Task</title>
  </head>
  <body>
      <div class="container">
      <br/>
      <br/>
      <br/>
      <br/>
    <h1 class="centerMe">Update Task</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="proj3.css">

    <div class="centerMe">
        <div class="card">
  <div class="card-body">
         <?php
            
            $updateID = $_POST['id'];
            $updateDesc = $_POST['description'];
            
            $manager = new TaskManager();
            
            $rowsUpdated = $manager->update($updateID, $updateDesc);
            
            echo "Task Number: " . $updateID . "<br/>";
            echo "Has Been updated to: " . $updateDesc . "<br/>";
            echo "Number of Rows Updated: $rowsUpdated";
            
        ?>
  </div>
</div>
    </div>
    </div>
     <br/>
     <div class="centerMe">
        <a class="btn btn-secondary" href="index.php" role="button">Home</a>
      </div>
 </body>
</html>