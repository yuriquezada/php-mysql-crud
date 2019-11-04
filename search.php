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

    $query = "SELECT * FROM student WHERE id==$id_search";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
      // $first_name = $_POST['first_name'];
      echo $row['last_name'];
      if(!$result) {
        die("Query Failed no se puede buscaaar.");
      }
     

      $_SESSION['message'] = $first_name;
      $_SESSION['message_type'] = 'danger';

      header('Location: index.php');
    }
    
  }

?>