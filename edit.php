<?php
require_once 'connection.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id=:id";
$stmt = $con->prepare($query);
$stmt ->bindParam(':id',$id);
$stmt ->execute();
$student = $stmt ->fetch(PDO::FETCH_ASSOC);

}
if(isset($_POST['username']) && ($_POST['email']) ){
$username = $_POST['username'];
$email = $_POST['email'];
$query = "update students set username=:username ,email=:email where id=:id";
$stmt = $con->prepare($query);
$stmt ->bindParam(':username',$username);
$stmt ->bindParam(':email',$email);
$stmt ->bindParam(':id',$id);
$stmt ->execute();
header('location:index.php');
exit();
}
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
          <h2>Update Students</h2>
          </div>

          <div class="card-body">
            <form method="POST" action="">

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" value="<?= $student['username']; ?>" class="form-control" id="username" name="username" placeholder="Password">
              </div>

              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" value="<?= $student['email']; ?>" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">

              </div>
              <button type="submit"  class="btn btn-primary">update Students</button>
            </form>
          </div>
      </div>
    </div>
  </body>
</html>
