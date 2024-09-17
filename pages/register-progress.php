<?php
  $br = '<br style="text-align: center">';
  if(isset($_POST['register'])){
    $usernameError = $emailError = $passwordError = $prepeatError = $error = '';
    $username = $email = $password = $prepeat = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['username'])){
      if(strlen($_POST['username']) >= 5 && strlen($_POST['username']) <= 24){
        $select = mysqli_query($connect, "select Username from Users where Username = '".test_input($connect, $_POST['username'])."'");
        $rows = mysqli_num_rows($select);
        if($rows == 0){
          $username = test_input($connect, $_POST['username']);
        }
        else{
          $usernameError = $errorStyle;
          $error = '<p class="error">This username already exists</p>';
          $br = '';
        }
      }
      else{
        $usernameError = $errorStyle;
        $error = '<p class="error">Username has to be 5 to 24 characters</p>';
        $br = '';
        $_POST['username'] = '';
      }
    }
    else{
      $usernameError = $errorStyle;
    }
    if(!empty($_POST['email'])){
      if(strlen($_POST['email']) >= 10 && strlen($_POST['email']) <= 24){
        $select = mysqli_query($connect, "select Email from Users where Email = '".test_input($connect, $_POST['email'])."'");
        $rows = mysqli_num_rows($select);
        if($rows == 0){
          $email = test_input($connect, $_POST['email']);
        }
        else{
          $emailError = $errorStyle;
          if(empty($error)){
            $error = '<p class="error">This email already exists</p>';
            $br = '';
          }
        }
      }
      else{
        $emailError = $errorStyle;
        if(empty($error)){
          $error = '<p class="error">Please try a different email</p>';
          $br = '';
        }
        $_POST['email'] = '';
      }
    }
    else{
      $emailError = $errorStyle;
    }
    if(!empty($_POST['password'])){
      if(strlen($_POST['password']) >= 8 && strlen($_POST['password']) <= 64){
        $password = test_input($connect, $_POST['password']);
      }
      else{
        $passwordError = $errorStyle;
        if(empty($error)){
          $error = '<p class="error">Password has to be 8 to 64 characters</p>';
          $br = '';
        }
        $_POST['password'] = '';
      }
    }
    else{
      $passwordError = $errorStyle;
    }
    if(!empty($_POST['prepeat'])){
      if($_POST['password'] == $_POST['prepeat']){
        $prepeat = test_input($connect, $_POST['prepeat']);
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
    if(empty($usernameError) && empty($emailError) && empty($passwordError) && empty($prepeatError) && empty($error)){
      $date = date('Y-m-d');
      $password = sha1($password);
      mysqli_query($connect, "insert into Users (Username, Email, Password, Date) values ('$username', '$email', '$password', '$date')");
      $select = mysqli_query($connect, "select * from Users where Username = '".$_POST["username"]."'");
      $array = mysqli_fetch_array($select);
      $_POST['username'] = '';
      $_POST['email'] = '';
      $_SESSION['id'] = $array['ID'];
      $_SESSION['username'] = $array['Username'];
      $_SESSION['email'] = $array['Email'];
      $_SESSION['picture'] = $array['Picture'];
      $_SESSION['privilage'] = $array['Privilage'];
      echo '<p class="report">Registering...</p>';
      echo '<script>window.location.replace("index.php?page=register");</script>';
    }
  }
?>

<article class="register">
  <form method="post">
    <div class="register-form">
      <div class="register-text-section">
        <input style="<?php echo $usernameError;?>" class="register-text" type="text" name="username" value="<?php echo $_POST['username'];?>" placeholder="Username" maxlength="24">
        <input style="<?php echo $emailError;?>" class="register-text" type="email" name="email" value="<?php echo $_POST['email'];?>" placeholder="Email" maxlength="24">
        <input style="<?php echo $passwordError;?>" class="register-text" type="password" name="password" placeholder="Password" maxlength="30">
        <input style="<?php echo $prepeatError;?>" class="register-text" type="password" name="prepeat" placeholder="Repeat Password" maxlength="30">
      </div>
      <?php echo $br;?>
      <?php echo $error;?>
      <button class="register-submit" type="submit" name="register">Register</button>
    </div>
  </form>
</article>
