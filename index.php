<?php
session_start();
require  'dbcon.php';

?>

<?php include('includes/header.php');?>




    <div class="container mt-4">
    <!-- PHP MESSAGE -->
    <?php include('message.php');?>
  

  <div class="row">
      <div class="col-md-12">
           <div class="card">
              <div class="card-header">
                 <h4>Student Details
                 <a href="create.php" class="btn btn-primary float-end">Add Student</a>
                 </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM students";
                                $query_run = mysqli_query($con, $query);

                                //  Condition if there's record
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>
                                        <tr>
                                            <td><?= $student['id']; ?></td>
                                            <td><?= $student['name']; ?></td>
                                            <td><?= $student['email']; ?></td>
                                            <td><?= $student['phone']; ?></td>
                                            <td><?= $student['course']; ?></td>
                                            <td>
                                                <a href="view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <!-- DELETE ITO -->
                                                <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</a>

                                                </form>

                                            </td>

                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "<h5>NO Record Found </h5>";
                                }
                                ?>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

    <?php include('includes/footer.php');?>
