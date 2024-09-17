<?php
  if(empty($_SESSION['privilage'])){
    echo '<p class="report">Transferring...</p>';
    echo '<script>window.location.replace("index.php?page=login");</script>';
  }
  else if($_SESSION['privilage'] != 'D'){
    echo '<p class="report">Transferring...</p>';
    echo '<script>window.location.replace("index.php?page=music");</script>';
  }

  if(isset($_POST['buy'])){
    $id = $_SESSION['id'];
    mysqli_query($connect, "update Users set Privilage = 'C' where ID = '".$id."'");
    $_SESSION['privilage'] = 'C';
    echo '<p class="report">Processing Transaction...</p>';
    echo '<script>window.location.replace("index.php?page=music");</script>';
  }
?>

<h2 class="section-header">Buy</h2>
<article class="music">
  <div class="music-cover">
    <img src="images/album-cover.jpg" alt="cover" width="100%" height="100%">
  </div>
  <h3 class="music-header">The Age</h3>
  <p class="music-price">13.99$</p>
  <p class="music-sale">0.00$</p>
  <form method="post">
    <button class="music-buy" type= "submit" name="buy">Purchase</button>
  </form>
</article>
