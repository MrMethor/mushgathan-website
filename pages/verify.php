<?php
  if($_SESSION['privilage'] == 'A'){
    switch($_GET['page']){
      case 'news-add': include ('pages/news-add.php'); break;
      case 'tour-add': include ('pages/tour-add.php'); break;
      case 'tour-edit': include ('pages/tour-edit.php'); break;
      case 'videos-add': include ('pages/videos-add.php'); break;
      default: include ('pages/news.php'); break;
    }
  }
  else if($_SESSION['privilage'] == 'A'){
    switch($_GET['page']){
      case 'tour-add': include ('pages/tour-add.php'); break;
      case 'tour-edit': include ('pages/tour-edit.php'); break;
      case 'news-add':
      case 'videos-add': echo '<p class="verify-text">You dont have the permission to access this page</p>
      <a class="back" href="index.php?page=news">< Go Back</a>'; break;
      default: include ('pages/news.php'); break;
    }
  }
  else{
    echo
    '<p class="verify-text">You dont have the permission to access this page</p>
    <a class="back" href="index.php?page=news">< Go Back</a>';
  }
?>
