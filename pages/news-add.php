<?php
  if(isset($_POST['submit'])){
    $titleError = $textError = $radioError = $linkError = $pictureError = '';
    $title = $text = $link = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['title'])){
      if(strlen($_POST['title']) <= 30){
        $title = test_input($connect, $_POST['title']);
      }
      else{
        $titleError = $errorStyle;
      }
    }
    else{
      $titleError = $errorStyle;
    }
    if(!empty($_POST['text'])){
      if(strlen($_POST['text']) <= 5000){
        $text = test_input($connect, $_POST['text']);
      }
      else{
        $textError = $errorStyle;
      }
    }
    else{
      $textError = $errorStyle;
    }
    if(!empty($_POST['radio'])){
      if($_POST['radio'] == 'none'){
        $media = 'N';
      }
      else if($_POST['radio'] == 'link'){
        if(!empty($_POST['link'])){
          if(strlen($_POST['link']) >= 4 && strlen($_POST['link']) <= 255){
            $link = test_input($connect, $_POST['link']);
            $media = 'V';
          }
          else{
            $linkError = $errorStyle;
          }
        }
        else{
          $linkError = $errorStyle;
        }
      }
      else if($_POST['radio'] == 'picture'){
        $fileName = $_FILES['picture']['name'];
        $fileTmp = $_FILES['picture']['tmp_name'];
        $fileError = $_FILES['picture']['error'];
        $fileSize = $_FILES['picture']['size'];
        $fileExtSep = explode('.', $fileName);
        $fileExt = strtolower(end($fileExtSep));
        $allowedExt = array('jpg', 'png', 'jpeg');
        if(in_array($fileExt, $allowedExt)){
          if($fileError === 0){
            if($fileSize < 100000000){
              $time = date('Y-m-d H:i:s');
              $fileNameNew = strtotime($time).'.jpg';
              $fileDestination = 'pictures/'.$fileNameNew;
              $media = 'P';
            }
            else{
              $pictureError = $errorStyle;
              echo 'The image is too big';
              echo $fileSize;
            }
          }
          else{
            $pictureError = $errorStyle;
            echo 'There was an error uploading your image';
            echo $fileError;
          }
        }
        else{
          $pictureError = $errorStyle;
          echo 'Only images are allowed';
        }
      }
      else{
        $radioError = $errorStyle;
      }
    }
    else{
      $radioError = "background-color: rgba(133, 0, 0, 0.5)";
    }
    if(empty($titleError) && empty($textError) && empty($radioError) && empty($linkError) && empty($pictureError)){
      $date = date('Y-m-d');
      if($_POST['radio'] == 'none'){
        mysqli_query($connect, "insert into News (Title, Text, Media, Date) values ('$title', '$text', '$media', '$date')");
        echo '<p class="report">Creating...</p>';
        echo '<script>window.location.replace("index.php?page=news");</script>';
      }
      else if($_POST['radio'] == 'link'){
        mysqli_query($connect, "insert into News (Title, Text, Media, Link, Date) values ('$title', '$text', '$media', '$link', '$date')");
        echo '<p class="report">Creating...</p>';
        echo '<script>window.location.replace("index.php?page=news");</script>';
      }
      else if($_POST['radio'] == 'picture'){
        move_uploaded_file($fileTmp, $fileDestination);
        mysqli_query($connect, "insert into News (Title, Text, Media, Date, Time) values ('$title', '$text', '$media', '$date', '$time')");
        echo '<p class="report">Creating...</p>';
        echo '<script>window.location.replace("index.php?page=news");</script>';
      }
      else{
        echo '<p class="report">Error has occured...</p>';
      }
    }
  }
?>

<h2 class="section-header">News</h2>
<article class="news">
  <a class="back" href="index.php?page=news">< Back</a>
  <form method="post" enctype="multipart/form-data">
    <div class="news-add">
      <input style="<?php echo $titleError;?>" class="news-add-input news-add-title" type="text" name="title" placeholder="Title" maxlength="30">
      <textarea style="<?php echo $textError;?>" class="news-add-input news-add-text" name="text" rows="5" cols="50" placeholder="Text (5000 max.)" maxlength="5000"></textarea>
      <div class="news-add-options">
        <div class="news-add-option">
          <input class="news-add-radio" type="radio" name="radio" value="none">
          <p class="news-add-radio-text">No Attachment</p>
        </div>
        <div class="news-add-option">
          <input class="news-add-radio" type="radio" name="radio" value="link">
          <input style="<?php echo $linkError;?>" class="news-add-input news-add-link" type="text" name="link" placeholder="Youtube Video Link" maxlength="255">
        </div>
        <div class="news-add-option"> 
          <input class="news-add-radio" type="radio" name="radio" value="picture">
          <input style="<?php echo $fileError;?>" class="news-add-input news-add-file" type="file" name="picture">
        </div>
      </div>
    </div>
    <button class="news-add-button" type= "submit" name="add">Create New</button>
  </form>
</article>
