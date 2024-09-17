<h2 class="section-header">Videos</h2>
<article class="videos">
  <?php
    if($_SESSION['privilage'] == 'A'){
      echo
      '<a class="videos-admin-button" href="index.php?page=videos-add">Add</a>';
    }
    $select = mysqli_query($connect, 'select * from Videos order by ID desc');
    while($row = mysqli_fetch_array($select)){
      $link = $row['Link'];
      $title = $row['Title'];
      echo
      '<div class="videos-video">
        <div class="videos-video-frame">
          <iframe width="100%" height="100%" src="'.$link.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <h3 class="videos-video-text">'.$title.'</h3>
      </div>';
    }
  ?>
</article>
