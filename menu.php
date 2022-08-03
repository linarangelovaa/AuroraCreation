<?php

require_once "autoload.php";

$loggedIn = isset($_SESSION['username']);

?>


<nav class="navbar navbar-dark bg-dark">
  <h5 class="text-white">ARTICLES PANEL</h5>
   <div style="padding:0px; background-color:transparent">
    <?= $loggedIn ? "<a class='btn btn-success' href='articles/add.php'class='btn btn-success'>Add an article</a>" : ""?>
    <?= $loggedIn ? "<a class='btn btn-danger align-items-end ml-5' href='auth/logout.php'class='btn btn-success'>Log out</a>" : "" ?>
    <?= !$loggedIn ? "<a class='btn btn-success' href='auth/index.php' class='btn btn-success'>Sign up</a>" : "" ?>
    </div>
</nav>