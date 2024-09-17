<h2 class="section-header">Music</h2>
<article class="music">
  <div class="music-cover">
    <img src="images/album-cover.jpg" alt="cover" width="100%" height="100%">
  </div>
  <h3 class="music-header">The Age</h3>
  <?php
    if($_SESSION['privilage'] == 'C' || $_SESSION['privilage'] == 'B' || $_SESSION['privilage'] == 'A'){
      include ('pages/music-purchased.php');
    }
    else{
      include ('pages/music-default.php');
    }
  ?>
</article>
