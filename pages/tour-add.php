<?php
  if(isset($_POST['add'])){
    $addressError = $linkError = $placeError = $dateError = '';
    $address = $link = $place = $date = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
    if(!empty($_POST['address'])){
      if(strlen($_POST['address']) <= 50){
        $address = test_input($connect, $_POST['address']);
      }
      else{
        $addressError = $errorStyle;
      }
    }
    else{
      $addressError = $errorStyle;
    }
    if(!empty($_POST['link'])){
      if(strlen($_POST['link']) >= 4 && strlen($_POST['link']) <= 255){
        $link = test_input($connect, $_POST['link']);
      }
      else{
        $linkError = $errorStyle;
      }
    }
    else{
      $linkError = $errorStyle;
    }
    if(!empty($_POST['place'])){
      if(strlen($_POST['place']) <= 30){
        $place = test_input($connect, $_POST['place']);
      }
      else{
        $placeError = $errorStyle;
      }
    }
    else{
      $placeError = $errorStyle;
    }
    if(!empty($_POST['date'])){
      if(strlen($_POST['date']) == 10){
        $date = test_input($connect, $_POST['date']);
      }
      else{
        $dateError = $errorStyle;
      }
    }
    else{
      $dateError = $errorStyle;
    }
    if(empty($addressError) && empty($linkError) && empty($placeError) && empty($dateError)){
      mysqli_query($connect, "insert into Tour (Address, Link, Place, Date) values ('$address', '$link', '$place', '$date')");
      echo '<p class="report">Adding...</p>';
      echo '<script>window.location.replace("index.php?page=tour");</script>';
    }
  }
?>

<h2 class="section-header">Tour</h2>
<article class="tour">
  <a class="back" href="index.php?page=tour">< Back</a>
  <form method="post">
    <div class="tour-add">
      <input style="<?php echo $addressError;?>" class="tour-add-input tour-add-address " type="text" name="address" placeholder="Address">
      <input style="<?php echo $linkError;?>" class="tour-add-input tour-add-link" type="text" name="link" placeholder="Buy Link">
      <input style="<?php echo $placeError;?>" class="tour-add-input tour-add-place" type="text" name="place" placeholder="Place">
      <input style="<?php echo $dateError;?>" class="tour-add-input tour-add-date" type="date" name="date" placeholder="DD/MM/YYYY">
    </div>
    <button class="tour-add-button" type= "submit" name="add">Add</button>
  </form>
</article>
