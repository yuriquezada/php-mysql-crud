<?php

include('db.php');

if (isset($_POST['save'])) {
  $id = $_POST['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $dni = $_POST['dni'];
  $program = $_POST['program'];
  $semester = $_POST['semester'];
  $fee = $_POST['fee'];
  $query = "INSERT INTO student(id, first_name, last_name, dni, program, semester, fee) VALUES ('$id', '$first_name','$last_name','$dni','$program','$semester','$fee')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  echo 'saved';

}

?>