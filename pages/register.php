<h2 class="section-header">Register</h2>
<?php
  if(empty($_SESSION['username'])){
    include ('pages/register-progress.php');
  }
  else{
    include ('pages/register-complete.php');
  }
?>
