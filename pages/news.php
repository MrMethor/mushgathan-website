<h2 class="section-header">News</h2>
<article class="news">
  <?php
    if($_SESSION['privilage'] == 'A'){
      echo '<a class="news-admin-button" href="index.php?page=news-add">Create New</a>';
    }
    $select = mysqli_query($connect, 'select * from News order by ID desc');
    for($i = 0; $i < 3; $i++){
      $row = mysqli_fetch_array($select);
      $title = $row['Title'];
      $date = $row['Date'];
      $dateAll = explode('-', $date);
      $text = $row['Text'];
      switch($row['Media']){
          case 'P': $media = '<div class="news-article-picture"><img src="pictures/'.strtotime($row['Time']).'.jpg" alt="picture" height="100%"></div>'; break;
          case 'V': $media = '<div class="news-article-video"><iframe width="100%" height="100%" src="'.$row["Link"].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>'; break;
          case 'N': $media = ''; break;
      };
      echo
      '<article class="news-article">
        <div class="news-article-header">
          <h3>'.$title.'</h3>
          <p>'.$dateAll[2].'/'.$dateAll[1].'/'.$dateAll[0].'</p>
        </div>
        '.$media.'
        <p class="news-article-text">'.$text.'</p>
      </article>';
    }
  ?>
</article>
