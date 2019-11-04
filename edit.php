<?php
include("db.php");
// $id = '';
$first_name = '';
$last_name = '';
$dni = '';
$program = '';
$semester = '';
$fee = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM student WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    // $id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $dni = $row['dni'];
    $program = $row['program'];
    $semester = $row['semester'];
    $fee = $row['fee'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  // $id= $_POST['id'];
  $first_name= $_POST['first_name'];
  $last_name= $_POST['last_name'];
  $dni= $_POST['dni'];
  $program= $_POST['program'];
  $semester= $_POST['semester'];
  $fee= $_POST['fee'];

  $query = "UPDATE student set id = '$id', first_name = '$first_name', last_name = '$last_name',dni = '$dni', program = '$program', semester = '$semester', fee = '$fee' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <!-- <div class="form-group">
            <input name="id" type="text" class="form-control" value=" ?>" placeholder="Update id">
          </div> -->
          <div class="form-group">
            <input name="first_name" type="text" class="form-control" value="<?php echo $first_name; ?>"
              placeholder="Update first_name">
          </div>
          <div class="form-group">
            <input name="last_name" type="text" class="form-control" value="<?php echo $last_name; ?>"
              placeholder="Update last_name">
          </div>
          <div class="form-group">
            <input name="dni" type="text" class="form-control" value="<?php echo $dni; ?>" placeholder="Update dni">
          </div>
          <div class="form-group">
            <input name="program" type="text" class="form-control" value="<?php echo $program; ?>"
              placeholder="Update program">
          </div>
          <div class="form-group">
            <input name="semester" type="number" class="form-control" value="<?php echo $semester; ?>"
              placeholder="Update semester">
          </div>
          <div class="form-group">
            <input name="fee" type="number" class="form-control" value="<?php echo $fee; ?>" placeholder="Update fee">
          </div>
          <button class="btn-success" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>