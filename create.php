<?php
session_start();
$message = $_SESSION['message'] ??null;
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
          <h2>Add Students</h2>
          </div>
          <?php if(isset($message)): ?>
          <div class="alert alert-success">
                <?php echo $message; ?>
          </div>
          <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
          <div class="card-body">
            <form method="POST" action="register.php">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">

              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Password">
              </div>
              <button type="submit"  class="btn btn-primary">Add Students</button>
            </form>
          </div>
      </div>
    </div>
  </body>
</html>
