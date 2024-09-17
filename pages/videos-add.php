<?php
  if(isset($_POST['add'])){
    $titleError = $linkError = '';
    $title = $link = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['title'])){
      if(strlen($_POST['title']) >= 5 && strlen($_POST['title']) <= 50){
        $title = test_input($connect, $_POST['title']);
      }
      else{
        $titleError = $errorStyle;
      }
    }
    else{
      $titleError = $errorStyle;
    }
    if(!empty($_POST['link'])){
      if(strlen($_POST['link']) >= 4 && strlen($_POST['link']) <= 255){
        $link = test_input($connect, $_POST['link']);
      }
      else{
        $linkError = $errorStyle;
      }
    }
    else{
      $linkError = $errorStyle;
    }
    if(empty($titleError) && empty($linkError)){
      mysqli_query($connect, "insert into Videos (Title, Link) values ('$title', '$link')");
      echo '<p class="report">Adding...</p>';
      echo '<script>window.location.replace("index.php?page=videos");</script>';
    }
  }
?>

<h2 class="section-header">Videos</h2>
<article class="videos">
  <a class="back" href="index.php?page=videos">< Back</a>
  <form method="post">
    <div class="videos-add">
      <input style="<?php echo $titleError;?>" class="videos-add-input videos-add-title " type="text" name="title" placeholder="Title">
      <input style="<?php echo $linkError;?>" class="videos-add-input videos-add-link" type="text" name="link" placeholder="Video Link">
    </div>
    <button class="videos-add-button" type= "submit" name="add">Add</button>
  </form>
</article>
