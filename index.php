<?php
session_start();
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO crud</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php if (isset($_SESSION['message'])) { ?>
                    <h5 class="alert alert-success">
                        <?= $_SESSION['message']; ?>
                    </h5>
                    <?php unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD

                            <a href="student-add.php
                    " class="btn btn-primary float-end">Add student</a>
                        </h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FullName</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM student";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();

                                $stmt->setFetchMode(PDO::FETCH_OBJ);

                                $result = $stmt->fetchAll();
                                if ($result) {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $row->id; ?>
                                            </td>
                                            <td>
                                                <?= $row->fullname ?>
                                            </td>
                                            <td>
                                                <?= $row->email ?>
                                            </td>
                                            <td>
                                                <?= $row->phone ?>
                                            </td>
                                            <td>
                                                <?= $row->course ?>
                                            </td>
                                            <td>
                                                <a href="student-edit.php?id=<?= $row->id; ?>" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="delete_student" value="<?= $row->id; ?>"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }

                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Recound Found</td>
                                    </tr>

                                    <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>