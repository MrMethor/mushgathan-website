<?php
  if(empty($_SESSION['username'])){
    echo '<p class="report">Transfering to the login page...</p>';
    echo '<script>window.location.replace("index.php?page=login");</script>';
  }
  $br = '<br style="text-align: center">';
  if(isset($_POST['change'])){
    $usernameError = $error = '';
    $username = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['username'])){
      if(strlen($_POST['username']) >= 5 && strlen($_POST['username']) <= 24){
        $select = mysqli_query($connect, "select Username from Users where Username = '".test_input($connect, $_POST["username"])."'");
        $rows = mysqli_num_rows($select);
        if($rows == 0){
          $username = test_input($connect, $_POST['username']);
          $id = $_SESSION['id'];
          $update = mysqli_query($connect, "update Users set Username = '".$username."' where ID = '".$id."'");
          $_SESSION['username'] = $username;
          echo '<p class="report">Updating...</p>';
          echo '<script>window.location.replace("index.php?page=profile");</script>';
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
      }
    }
    else{
      $usernameError = $errorStyle;
    }
  }
?>

<h2 class="section-header">Username</h2>
<article class="change">
  <a class="back" href="index.php?page=profile">< Back</a>
  <form method="post">
    <input style="<?php echo $usernameError;?>" class="change-input" type="text" name="username" placeholder="New Username">
    <?php
      echo $br;
      echo $error;
    ?>
    <button class="change-button" type= "submit" name="change">Change Username</button>
  </form>
</article>
