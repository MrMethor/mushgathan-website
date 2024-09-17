<?php
  if(empty($_SESSION['username'])){
    echo '<p class="report">Transfering to the login page...</p>';
    echo '<script>window.location.replace("index.php?page=login");</script>';
  }
  $br = '<br style="text-align: center">';
  if(isset($_POST['upload'])){
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    $fileName = $_FILES['pfp']['name'];
    $fileTmp = $_FILES['pfp']['tmp_name'];
    $fileError = $_FILES['pfp']['error'];
    $fileSize = $_FILES['pfp']['size'];
    $fileExtSep = explode('.', $fileName);
    $fileExt = strtolower(end($fileExtSep));
    $allowedExt = array('jpg', 'png', 'jpeg');
    if(in_array($fileExt, $allowedExt)){
      if($fileError === 0){
        if($fileSize < 10000000){
          $fileNameNew = $_SESSION['id'].'.jpg';
          $fileDestination = 'pfps/'.$fileNameNew;
          move_uploaded_file($fileTmp, $fileDestination);
          if($_SESSION['picture'] == 0){
            $update = mysqli_query($connect, "update Users set Picture = '1' where ID = ".$_SESSION['id']);
            $_SESSION['picture'] = 1;
          }
          echo '<p class="report">Changing your profile picture...</p>';
          echo '<script>window.location.replace("index.php?page=profile");</script>';
        }
        else{
          $error = '<p class="error">This image is too big (max. 10MB)</p>';
          $br = '';
        }
      }
      else{
        $error = '<p class="error">There was an error uploading your image</p>';
        $br = '';
      }
    }
    else{
      $error = '<p class="error">Only images are allowed</p>';
      $br = '';
    }
  }
?>

<h2 class="section-header">Profile</h2>
<article class="profile">
  <div class="profile-upper">
    <div style="<?php
      if($_SESSION['privilage'] == "A"){
        echo 'border: 2px solid #ffcc00';
      }
      else if($_SESSION['privilage'] == "B"){
        echo 'border: 2px solid #ff0000';
      }
      else{
        echo 'border: 2px solid rgba(0, 0, 0, 0)';
      }
    ?>" class="profile-picture">
      <img src="pfps/<?php
        if($_SESSION['picture'] == 1){
          $pictureID = $_SESSION['id'];
          echo $pictureID;
        }
        else {
          $pictureID = 'default';
          echo $pictureID;
        }
      ?>.jpg?<?php echo time();?>" alt="profile" height="100%" width="100%">
    </div>
    <div class="profile-change-pfp">
      <form method="post" enctype="multipart/form-data">
        <div class="profile-change-pfp-block">
          <label for="pfp" class="profile-change-pfp-button">Choose</label>
          <input type="file" id="pfp" name="pfp" style="display:none">
          <button class="profile-change-pfp-button" type="submit" name="upload">Upload</button>
        </div>
      </form>
      <?php
        echo $br;
        echo $error;
      ?>
    </div>
  </div>
  <div class="profile-lower">
    <div class="profile-info">
      <p class="profile-username"><?php echo $_SESSION['username'];?></p>
      <p class="profile-email"><?php echo $_SESSION['email'];?></p>
    </div>
    <a class="profile-change-button" href="index.php?page=change-username">Change Username</a>
    <a class="profile-change-button" href="index.php?page=change-email">Change Email</a>
    <a class="profile-change-button" href="index.php?page=change-password">Change Password</a>
    <div class="profile-buttons">
      <a class="profile-delete-button" href="index.php?page=delete">Delete</a>
      <a class="profile-logout-button" href="index.php?page=logout">Logout</a>
    </div>
  </div>
</article>
