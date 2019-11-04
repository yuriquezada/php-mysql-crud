<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $first_name = $_POST['first_name'];
  $description = $_POST['description'];
  $query = "INSERT INTO task(first_name, description) VALUES ('$first_name', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
