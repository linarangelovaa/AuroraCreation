<?php 
session_start();
require_once "register.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Register</title>
  </head>
  <body>

  <nav class="navbar navbar-dark bg-dark">
  <h5 class="text-white">ARTICLES PANEL</h5>
</nav>
<div class="container w-25 mt-5">
<form method="POST" action="registration.php">
    <h2>Register</h2><br>
    <?php 
           if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'error'){
            if ($_SESSION['reason'] == 'password') {
                $message = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            } 
            elseif ($_SESSION['reason'] == 'username') {
                $message = "Only alphabets and white space are allowed for username";
            } 
            elseif ($_SESSION['empty'] == 'all') {
                $message = "Please fill in all fields.";
            } 
            elseif ($_SESSION['reason'] == 'emptypassword') {
                $message = "Password is required";
            } 
            elseif ($_SESSION['reason'] == 'emptyusername') {
                $message = "Username is required";
            } 
            echo "<div class='alert alert-danger' role='alert'>$message</div>";;
        }
        unset($_SESSION['status']);
    }
?>
  <div class="form-group">
  <label for="exampleInputUsername">Username</label>
    <input type="text" class="form-control"  name="username" placeholder="Username" value="<?= $_SESSION['old_usern'] ?? "" ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"placeholder="Password" value="<?= $_SESSION['old_pass'] ?? "" ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button><br><br>
  <p>Already have an accout?<a class="text-danger" style="text-decoration:none" href="index.php"> Login</a></p>
</form>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>