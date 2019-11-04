<?php

include("db.php");

$id_search=$_POST['id_search'];
echo $id_search;


  if(isset($_POST['search'])){

    // $id = $_GET['id'];
    $query = "SELECT * FROM student WHERE id=$id_search";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      // $row = mysqli_fetch_array($result);
      echo $row['id'];
      if(!$result) {
        die("Query Failed no se pede borrar.");
      }
  
      $_SESSION['message'] = 'Student Removed Successfully';
      $_SESSION['message_type'] = 'danger';
      echo "Para escapar caracteres se hace \"así\".";
  
      header('Location: index.php');
    }

  }

?>