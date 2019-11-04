<?php

  if(isset($_POST['search'])){
    include("db.php");

    $id_search=$_POST['id_search'];
    echo $id_search;

    if($id_search=="")
      {echo "Digita un documento por favor. (Ej: 123)";}
    else{
      $query = "SELECT * FROM student WHERE id=$id_search";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_array($result)){
        $miresultado=        "
        <table width=\"100%\" border=\"1\">
          <tr>
            <td><b><center>ID</center></b></td>
            <td><b><center>First name</center></b></td>
            <td><b><center>Last name</center></b></td>
            <td><b><center>DNI</center></b></td>
            <td><b><center>Program</center></b></td>
            <td><b><center>Semester</center></b></td>
            <td><b><center>Fee</center></b></td>

          </tr>
          <tr>
            <td>".$row['id']."</td>
            <td>".$row['first_name']."</td>
            <td>".$row['last_name']."</td>
            <td>".$row['dni']."</td>
            <td>".$row['program']."</td>
            <td>".$row['semester']."</td>
            <td>".$row['fee']."</td>
          </tr>
        </table>
      ";
        $_SESSION['elresultado'] = $miresultado;

        header('Location: index.php');
      }
    }
    
  }
?>