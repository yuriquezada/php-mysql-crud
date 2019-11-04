<?php

  if(isset($_POST['search'])){
    include("db.php");

    $id_search=$_POST['id_search'];
    echo $id_search;
    if(!is_numeric($id_search))
      {echo "Digita un documento por favor. (Ej: 123)";}
    else{
      $query = "SELECT * FROM student WHERE id=$id_search";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_array($result)){
        $_SESSION['id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['dni'] = $row['dni'];
        $_SESSION['program'] = $row['program'];
        $_SESSION['semester'] = $row['semester'];
        $_SESSION['fee'] = $row['fee'];

        header('Location: index.php');
      }
    }
  }
?>