<?php 
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit & Update data in to database using PDO crud</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">

                    <div class="card-header">
                        <h3>Edit & Update in the database using PHP PDO CRUD

                            <a href="index.php
                    " class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <?php 
                        if(isset($_GET['id'])){
                            $student_id = $_GET['id'];

                            $query = "SELECT * FROM student WHERE id=:stud_id LIMIT 1";
                            $stmt = $conn->prepare($query);
                            $data = [':stud_id' => $student_id];
                            $stmt->execute($data);

                            $row =$stmt->fetch(PDO::FETCH_ASSOC );

                        }
                        ?>

                        <form action="code.php" method="POST">
                            <input type="hidden" name="student_id" value="<?=$row['id'];?>">
                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="fullname" value="<?= $row['fullname'];?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="<?=$row['email'];?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" value="<?=$row['phone'];?> "class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Course</label>
                                <input type="text" name="course" value="<?=$row['course'];?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_student_btn" class="btn btn-primary">Save
                                    Student</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>