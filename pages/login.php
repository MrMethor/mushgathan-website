<?php
  if(isset($_SESSION['username'])){
    echo '<p class="report">Transfering to the profile page...</p>';
    echo '<script>window.location.replace("index.php?page=profile");</script>';
  }
  $br = '<br style="text-align: center">';
  if(isset($_POST['login'])){
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    $username = $email = $password = '';
    if(!empty($_POST['username-email'])){
      $select = mysqli_query($connect, "select Username from Users where Username = '".test_input($connect, $_POST['username-email'])."'");
      $rows = mysqli_num_rows($select);
      if($rows != 0){
        $username = test_input($connect, $_POST['username-email']);
      }
      else{
        $select = mysqli_query($connect, "select Email from Users where Email = '".test_input($connect, $_POST['username-email'])."'");
        $rows = mysqli_num_rows($select);
        if($rows != 0){
          $email = test_input($connect, $_POST['username-email']);
        }
        else{
          $usernameEmailError = $errorStyle;
          $error = '<p class="error">This Username or Email doesn\'t exist</p>';
          $br = '';
        }
      }
    }
    else{
      $usernameEmailError = $errorStyle;
    }
    if(!empty($_POST['password'])){
      if(!empty($username) || !empty($email)){
        if(!empty($username)){
          $command = "select * from Users where Username = '".test_input($connect, $_POST['username-email'])."'";
        }
        else{
          $command = "select * from Users where Email = '".test_input($connect, $_POST['username-email'])."'";
        }
        $select = mysqli_query($connect, $command);
        $array = mysqli_fetch_array($select);
        $password = sha1(test_input($connect, $_POST['password']));
        if($password == $array['Password']){
          $_POST['username-email'] = '';
          $_SESSION['id'] = $array['ID'];
          $_SESSION['username'] = $array['Username'];
          $_SESSION['email'] = $array['Email'];
          $_SESSION['picture'] = $array['Picture'];
          $_SESSION['privilage'] = $array['Privilage'];
          echo '<p class="report">Logging in...</p>';
          echo '<script>window.location.replace("index.php?page=news");</script>';
        }
        else{
          $passwordError = $errorStyle;
          if(empty($error)){
            $error = '<p class="error">Wrong Password</p>';
            $br = '';
          }
        }
      }
      else{
        $passwordError = $errorStyle;
      }
    }
    else{
      $passwordError = $errorStyle;
    }
  }
?>

<h2 class="section-header">Login</h2>
<article class="login">
  <form method="post">
    <div class="login-form">
      <div class="login-text-section">
        <input style="<?php echo $usernameEmailError;?>" class="login-text" type="text" name="username-email" value="<?php echo $_POST['username-email'];?>" placeholder="Username/Email" maxlength="24">
        <input style="<?php echo $passwordError;?>" class="login-text" type="password" name="password" placeholder="Password" maxlength="30">
      </div>
      <?php
        echo $br;
        echo $error;
      ?>
      <button class="login-submit" type="submit" name="login">Login</button>
      <a class="login-link" href="#">Forgot Password?</a>
    </div>
  </form>
</article>
<article class="or">
  <hr class="or-line">
  <span class="or-text">or</span>
  <hr class="or-line">
</article>
<article class="login-register">
  <a class="login-register-button" href="index.php?page=register">Register</a>
  <a class="login-link" href="#">Privacy Policy</a>
</article>
