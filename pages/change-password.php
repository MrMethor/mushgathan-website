<?php
  if(empty($_SESSION['username'])){
    echo '<p class="report">Transfering to the login page...</p>';
    echo '<script>window.location.replace("index.php?page=login");</script>';
  }
  $br = '<br style="text-align: center">';
  if(isset($_POST['change'])){
    $passwordOldError = $passwordNewError = $prepeatError = $error = '';
    $passwordOld = $passwordNew = $prepeat = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['passwordOld'])){
      $id = $_SESSION['id'];
      $select = mysqli_query($connect, "select * from Users where ID = '".$id."'");
      $array = mysqli_fetch_array($select);
      if(sha1(test_input($connect, $_POST['passwordOld'])) == $array['Password']){
        $passwordOld = sha1(test_input($connect, $_POST['passwordOld']));
      }
      else{
        $passwordOldError = $errorStyle;
        $error = '<p class="error">Wrong Password</p>';
        $br = '';
      }
    }
    else{
      $passwordOldError = $errorStyle;
    }
    if(!empty($_POST['passwordNew'])){
      if(strlen($_POST['passwordNew']) >= 8 && strlen($_POST['passwordNew']) <= 30){
        $passwordNew = sha1(test_input($connect, $_POST['passwordNew']));
      }
      else{
        $passwordNewError = $errorStyle;
        if(empty($error)){
          $error = '<p class="error">Password has to be 8 to 30 characters</p>';
          $br = '';
        }
      }
    }
    else{
      $passwordNewError = $errorStyle;
    }
    if(!empty($_POST['prepeat'])){
      if($_POST['passwordNew'] == $_POST['prepeat']){
        $prepeat = $_POST['prepeat'];
      }
      else{
        $prepeatError = $errorStyle;
        if(empty($error)){
          $error = '<p class="error">The passwords don\'t match</p>';
          $br = '';
        }
        $_POST['prepeat'] = '';
      }
    }
    else{
      $prepeatError = $errorStyle;
    }
    if(empty($passwordOldError) && empty($passwordNewError) && empty($prepeatError) && empty($error)){
      $id = $_SESSION['id'];
      $update = mysqli_query($connect, "update Users set Password = '".$passwordNew."' where ID = '".$id."'");
      echo '<p class="report">Updating...</p>';
      echo '<script>window.location.replace("index.php?page=profile");</script>';
    }
  }
?>

<h2 class="section-header">Password</h2>
<article class="change">
  <a class="back" href="index.php?page=profile">< Back</a>
  <form method="post">
    <input style="<?php echo $passwordOldError;?>" class="change-input" type="password" name="passwordOld" placeholder="Old Password">
    <input style="<?php echo $passwordNewError;?>" class="change-input" type="password" name="passwordNew" placeholder="New Password">
    <input style="<?php echo $prepeatError;?>" class="change-input" type="password" name="prepeat" placeholder="Repeat Password">
    <?php
      echo $br;
      echo $error;
    ?>
    <button class="change-button" type= "submit" name="change">Change Password</button>
  </form>
</article>
