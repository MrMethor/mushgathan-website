<div class="songs">
  <div class="song">
    <p class="song-name">01 - Disapprobation</p>
  </div>
  <div class="song">
    <p class="song-name">02 - Simple</p>
  </div>
  <div class="song">
    <p class="song-name">03 - Hard</p>
  </div>
  <div class="song">
    <p class="song-name">04 - Soft</p>
  </div>
  <div class="song">
    <p class="song-name">05 - Low</p>
  </div>
  <div class="song">
    <p class="song-name">06 - Punk Is Now Dead</p>
  </div>
  <div class="song">
    <p class="song-name">07 - Inner Peace</p>
  </div>
  <div class="song">
    <p class="song-name">08 - Quiet</p>
  </div>
  <div class="song">
    <p class="song-name">09 - Slow</p>
  </div>
</div>
<a class="music-buy" href=
  <?php
    if(isset($_SESSION['username'])){
      echo '"index.php?page=music-buy"';
    }
    else{
      echo '"index.php?page=login"';
    }
  ?>
>Purchase</a>
