<?php
  session_start();
  session_destroy();
  echo '<p class="report">Logging out...</p>';
  echo '<script>window.location.replace("index.php?page=news");</script>';
?>
