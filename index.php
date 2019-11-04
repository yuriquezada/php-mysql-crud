<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row mb-3">
    <div class="col-sm">
      <form class="form w-50" action="search.php" method="POST">
        <input class="form-control mr-sm-2" name="id_search" type="search" placeholder="Search ID" aria-label="Search">
        <input type="submit" name="search" class="btn btn-success btn-block" value="Search">
      </form>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-sm">
      <?php if (isset($_SESSION['id'])) { ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First name</th>
              <th scope="col">Last name</th>
              <th scope="col">DNI</th>
              <th scope="col">Program</th>
              <th scope="col">Semester</th>
              <th scope="col">Fee</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><?= $_SESSION['id']?></th>
              <td><?= $_SESSION['first_name']?></td>
              <td><?= $_SESSION['last_name']?></td>
              <td><?= $_SESSION['dni']?></td>
              <td><?= $_SESSION['program']?></td>
              <td><?= $_SESSION['semester']?></td>
              <td><?= $_SESSION['fee']?></td>
            </tr>
          </tbody>
        </table>
      
        <div>
        
        
      </div>
      <?php session_unset(); }  ?>
    </div>
  </div>


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

      <!-- ADD STUDENT FORM -->
      <div class="card card-body">
      <h3>Enter student data</h3>

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
      <h3 class="text-center">Students list</h3>
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