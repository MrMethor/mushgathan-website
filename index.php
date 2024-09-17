<?php
  session_start();
  if(empty($_GET['page'])){
    $_GET['page'] = 'news';
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="mushgathan, band, website, slovakia">
    <meta name="description" content="News and Music">
    <meta name="author" content="Jakub Rosa">
    <link rel="stylesheet" href="style.css">
    <title>Mushgathan - Official</title>
    <?php
      switch($_GET['page']){
        case 'news': echo ('<link rel="stylesheet" href="styles/news.css">'); break;
        case 'news-add': echo ('<link rel="stylesheet" href="styles/news-add.css">'); break;
        case 'music':
        case 'music-buy': echo ('<link rel="stylesheet" href="styles/music.css">'); break;
        case 'tour': echo ('<link rel="stylesheet" href="styles/tour.css">'); break;
        case 'tour-add': echo ('<link rel="stylesheet" href="styles/tour-add.css">'); break;
        case 'tour-edit': echo ('<link rel="stylesheet" href="styles/tour-edit.css">'); break;
        case 'videos': echo ('<link rel="stylesheet" href="styles/videos.css">'); break;
        case 'videos-add': echo ('<link rel="stylesheet" href="styles/videos-add.css">'); break;
        case 'about': echo ('<link rel="stylesheet" href="styles/about.css">'); break;
        case 'login': echo ('<link rel="stylesheet" href="styles/login.css">'); break;
        case 'register': echo ('<link rel="stylesheet" href="styles/register.css">'); break;
        case 'profile': echo ('<link rel="stylesheet" href="styles/profile.css">'); break;
        case 'search': echo ('<link rel="stylesheet" href="styles/search.css">'); break;
        case 'change-username':
        case 'change-email':
        case 'change-password':
        case 'delete': echo ('<link rel="stylesheet" href="styles/change.css">'); break;
        default: echo ('<link rel="stylesheet" href="styles/news.css">'); break;
      }
    ?>
  </head>

  <body>

    <!--- H E A D E R --->
    <header class="header">
      <a class="header-button-text" href="index.php?page=search">Search</a>
      <a class="header-button-icon" href="index.php?page=search"><img src="images/search.png" alt="search" width="30px" height="30px"></a>
      <a class="title" href="index.php?page=news">Mushgathan</a>
      <?php
        if(empty($_SESSION['username'])){
          echo '<a class="header-button-text" href="index.php?page=login">Login</a>';
        }
        else{
          echo '<a class="header-button-text" href="index.php?page=profile">Profile</a>';
        }
      ?>
      <a class="header-button-icon" href="index.php?page=login"><img src="images/profile.png" alt="profile" width="30px" height="30px"></a>
    </header>

    <!--- N A V I G A T I O N --->
    <nav class="nav">
      <a class="<?php if($_GET['page'] == 'news' || $_GET['page'] == 'news-add'){echo 'nav-button-choosen';}else{echo 'nav-button';}?>" href="index.php?page=news">News</a>
      <a class="<?php if($_GET['page'] == 'music' || $_GET['page'] == 'music-buy'){echo 'nav-button-choosen';}else{echo 'nav-button';}?>" href="index.php?page=music">Music</a>
      <a class="<?php if($_GET['page'] == 'tour' || $_GET['page'] == 'tour-add' || $_GET['page'] == 'tour-edit'){echo 'nav-button-choosen';}else{echo 'nav-button';}?>" href="index.php?page=tour">Tour</a>
      <a class="<?php if($_GET['page'] == 'videos' || $_GET['page'] == 'videos-add'){echo 'nav-button-choosen';}else{echo 'nav-button';}?>" href="index.php?page=videos">Videos</a>
      <a class="<?php if($_GET['page'] == 'about'){echo 'nav-button-choosen';}else{echo 'nav-button';}?>" href="index.php?page=about">About</a>
    </nav>

    <div class="phone-buttons">
      <a class="phone-button" href="index.php?page=search">Search</a>
      <?php
        if(empty($_SESSION['username'])){
          echo '<a class="phone-button" href="index.php?page=login">Login</a>';
        }
        else{
          echo '<a class="phone-button" href="index.php?page=profile">Profile</a>';
        }
      ?>
    </div>

    <!--- S E C T I O N --->
    <section>
      <?php
        include 'pages/mysqli.php';
        switch($_GET['page']){
          case 'news': include ('pages/news.php'); break;
          case 'music': include ('pages/music.php'); break;
          case 'music-buy': include ('pages/music-buy.php'); break;
          case 'tour': include ('pages/tour.php'); break;
          case 'videos': include ('pages/videos.php'); break;
          case 'about': include ('pages/about.php'); break;
          case 'search': include ('pages/search.php'); break;
          case 'register': include ('pages/register.php'); break;
          case 'login': include ('pages/login.php'); break;
          case 'profile': include ('pages/profile.php'); break;
          case 'logout': include ('pages/logout.php'); break;
          case 'delete': include ('pages/delete.php'); break;
          case 'change-username': include ('pages/change-username.php'); break;
          case 'change-email': include ('pages/change-email.php'); break;
          case 'change-password': include ('pages/change-password.php'); break;
          case 'news-add':
          case 'tour-add':
          case 'tour-edit':
          case 'videos-add': include ('pages/verify.php'); break;
          default: include ('pages/news.php'); break;
        }
        function test_input($connect, $data){
          $data = trim($data);
          $data = strip_tags($data);
          $data = mysqli_real_escape_string($connect, $data);
          return $data;
        }
      ?>
    </section>

    <!--- F O O T E R --->
    <footer>
      <div class="footer-separation"><br></div>
      <div class="footer-links">
        <a class="footer-link" href="https://www.youtube.com/channel/UCUM0-AmPK0DihJCMfBxfWNA" target="_blank"><img src="images/youtube.png" alt="youtube" width="30px" height="30px"></a>
        <a class="footer-link" href="https://open.spotify.com/user/2xejhup6rb9u7g2jfbj1sn7no" target="_blank"><img src="images/spotify.png" alt="spotify" width="30px" height="30px"></a>
        <a class="footer-link" href="https://www.bandcamp.com/" target="_blank"><img src="images/bandcamp.png" alt="bandcamp" width="30px" height="30px"></a>
        <a class="footer-link" href="https://twitter.com/MrMethor" target="_blank"><img src="images/twitter.png" alt="twitter" width="30px" height="30px"></a>
        <a class="footer-link" href="https://www.instagram.com/mrmethor/" target="_blank"><img src="images/instagram.png" alt="instagram" width="30px" height="30px"></a>
        <a class="footer-link" href="https://discord.gg/Uj5F58DnHD" target="_blank"><img src="images/discord.png" alt="discord" width="30px" height="30px"></a>
      </div>
      <p class="footer-cop">© Copyright 2022</p>
    </footer>

  </body>
</html>
