<?php
require_once 'connection.php';
$query = "SELECT * FROM students";
$stmt = $con->prepare($query);
$stmt ->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>crud application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      <ul class="mt-5">
        <li> <a href="/">Home</a> </li>
        <li> <a href="create.php">Create</a> </li>
      </ul>
    </div>
    <div class="container">
      <div class="card mt-5">
          <div class="card-header">
          <h2>Available Students</h2>
          </div>

          <div class="card-body">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($students as $student) :?>
      <tr>
        <td><?= $student['id'] ?></td>
        <td><?= $student['username'] ?></td>
        <td><?= $student['email'] ?></td>
        <td>
          <a class="btn btn-info" href="edit.php?id=<?= $student['id'] ?>">edit</a>
          <a class="btn btn-warning" href="delete.php?id=<?= $student['id'] ?>">delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
          </div>
      </div>
    </div>
  </body>
</html>
