<?php
  if(empty($_SESSION['username'])){
    echo '<p class="report">Transfering to the login page...</p>';
    echo '<script>window.location.replace("index.php?page=login");</script>';
  }
  $br = '<br style="text-align: center">';
  if(isset($_POST['delete'])){
    if(!empty($_POST['password'])){
      $id = $_SESSION['id'];
      $select = mysqli_query($connect, "select * from Users where ID = '".$id."'");
      $array = mysqli_fetch_array($select);
      $password = sha1(test_input($connect, $_POST['password']));
      if($password == $array['Password']){
        $delete = mysqli_query($connect, "delete from Users where ID = '".$id."'");
        session_start();
        session_destroy();
        echo '<p class="report">Deleting your account...</p>';
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
?>

<h2 class="section-header">Delete</h2>
<article class="change">
  <a class="back" href="index.php?page=profile">< Back</a>
  <form method="post">
    <input style="<?php echo $passwordError;?>" class="change-input" type="password" name="password" placeholder="Password">
    <?php
      echo $br;
      echo $error;
    ?>
    <button class="change-button" type= "submit" name="delete">Delete Profile</button>
  </form>
</article>
