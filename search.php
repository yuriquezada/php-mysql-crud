<?php





// if(isset($_GET['id'])) {
//   $id = $_GET['id'];
//   $query = "DELETE FROM student WHERE id = $id";
//   $result = mysqli_query($conn, $query);
//   if(!$result) {
//     die("Query Failed no se pede borrar.");
//   }

//   $_SESSION['message'] = 'Student Removed Successfully';
//   $_SESSION['message_type'] = 'danger';
//   header('Location: index.php');
// }

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
        echo 
        "
          <table width=\"100%\" border=\"1\">
            <tr>
              <td><b><center>IDo</center></b></td>
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
      }
    }
    
    //  {
    //   // $first_name = $_POST['first_name'];
    //   echo $row['last_name'];
    //   if(!$result) {
    //     die("Query Failed no se puede buscaaar.");
    //   }
     

    //   $_SESSION['message'] = $first_name;
    //   $_SESSION['message_type'] = 'danger';

    //   header('Location: index.php');
    // }
    
  }

?>