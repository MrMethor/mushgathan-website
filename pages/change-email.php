<?php
  if(empty($_SESSION['username'])){
    echo '<p class="report">Transfering to the login page...</p>';
    echo '<script>window.location.replace("index.php?page=login");</script>';
  }
  $br = '<br style="text-align: center">';
  if(isset($_POST['change'])){
    $emailError = $passwordError = $error = '';
    $email = $password = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['email'])){
      if(strlen($_POST['email']) >= 10 && strlen($_POST['email']) <= 24){
        $select = mysqli_query($connect, "select Email from Users where Email = '".test_input($connect, $_POST['email'])."'");
        $rows = mysqli_num_rows($select);
        if($rows == 0){
          $email = test_input($connect, $_POST['email']);
        }
        else{
          $emailError = $errorStyle;
          $error = '<p class="error">This email already exists</p>';
          $br = '';
          $_POST['email'] = '';
        }
      }
      else{
        $emailError = $errorStyle;
        $error = '<p class="error">Email has to be 10 to 24 characters</p>';
        $br = '';
      }
    }
    else{
      $emailError = $errorStyle;
    }
    if(!empty($_POST['password'])){
        $select = mysqli_query($connect, "select * from Users where Email = '".test_input($connect, $_POST['email'])."'");
        $array = mysqli_fetch_array($select);
        $password = sha1(test_input($connect, $_POST['password']));
        if($password == $array['Password']){
          $id = $_SESSION['id'];
          $_POST['email'] = '';
          $update = mysqli_query($connect, "update Users set Email = '".$email."' where ID = '".$id."'");
          $_SESSION['email'] = $email;
          echo '<p class="report">Updating...</p>';
          echo '<script>window.location.replace("index.php?page=profile");</script>';
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
?>

<h2 class="section-header">Email</h2>
<article class="change">
  <a class="back" href="index.php?page=profile">< Back</a>
  <form method="post">
    <input style="<?php echo $emailError;?>" class="change-input" type="text" name="email" placeholder="New Email" value="<?php echo $_POST['email']?>">
    <input style="<?php echo $passwordError;?>" class="change-input" type="password" name="password" placeholder="Password">
    <?php
      echo $br;
      echo $error;
    ?>
    <button class="change-button" type= "submit" name="change">Change Email</button>
  </form>
</article>
