<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); }  ?>

      <!-- ADD student FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="first_name" class="form-control" placeholder="First name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="last_name" class="form-control" placeholder="Last name" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="dni" class="form-control" placeholder="DNI" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="program" class="form-control" placeholder="Program" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="semester" class="form-control" placeholder="Semester" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="fee" class="form-control" placeholder="Fee" autofocus>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Save">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>DNI</th>
            <th>Program</th>
            <th>Semester</th>
            <th>Fee</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM student";
          $result_students = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_students)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['dni']; ?></td>
            <td><?php echo $row['program']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['fee']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
