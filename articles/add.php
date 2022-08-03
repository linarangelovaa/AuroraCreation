<?php

require_once "../autoload.php";
authOnly();


$sqlCategory = "SELECT * FROM categories";
$stmtCategory = $pdo->query($sqlCategory);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add an article</title>
  </head>
  <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
  <body>
  <?php
    require_once "../menu.php";
  ?>
    

<div class="container w-25 mt-5">
  <div class="justify-content-md-center ">
  <form method="POST" action="store.php">
    
  <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Title" required>

    <label for="description">Description</label><br>
    <textarea type="text" id="description" name="description" placeholder="Description" rows="4" cols="39" required></textarea><br>

    <label for="status">Status</label><br>
    <input type="text" id="status" name="status" placeholder="Status" required>

    <label>Category</label><br />
        <select name="category_id">
            <?php
            while ($category = $stmtCategory->fetch()) {
                $categoryId = encrypt($category['id']);
                echo "<option value='$categoryId'>{$category['name']}</option>";
            }
            ?>
        </select><br />

    <input class="mt-4" type="submit" value="Create">
  </form>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>