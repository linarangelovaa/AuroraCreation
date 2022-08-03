<?php

require_once "db.php";
require_once "functions.php";

$sql = "SELECT articles.*, categories.name as category_name FROM `articles` INNER JOIN `categories` ON articles.category_id = categories.id";
$stmt= $pdo->query($sql);

$loggedIn = isset($_SESSION['username']);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
      .classWithShadow{
     box-shadow: 3px 3px green; 
}
    </style>
    <title>Articles Panel</title>
  </head>
  <body>
  <?php
    require_once "menu.php";
  ?>
    
  <div class="container">
  <div class="row justify-content-md-center">
       <?php
       
       while ($article= $stmt ->fetch())
       {
        $id=encrypt($article['id']);
        $id=urlencode($id);


       echo "
        <div class='card border-success mb-3 mr-4 mt-5 col col-sm-6' style='max-width: 18rem;'>
        <div class='card-body text-success'>
          <h5 class='card-title'>Title: {$article['title']}</h5>
          <p class='card-text'>Description: {$article['description']}</p>
          <p class='card-text'>Status: {$article['status']}</p>
          <p class='card-text'>";
          if(($article['category_name'])=='none')
          {
            echo"</p>";} 
            else {echo "Category:{$article['category_name']} </p>"; }
        echo "</div>
        <div class='card-footer bg-transparent border-success d-flex justify-content-center'>";
        if (isset($_SESSION['username'])){
        echo "<a href='articles/edit.php?id={$id}' class='btn btn-primary m-1'>Edit</a>
        <a href='articles/delete.php?id={$id}' class='btn btn-primary m-1'>Delete</a>";
        }
        echo "</div>
      </div>";
       }
        ?>
      </div>
    </div>
    <script>
$(".card").hover(function()
{ 
   $(this).toggleClass('classWithShadow');
});
</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>