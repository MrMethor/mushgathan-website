<?php
  if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    mysqli_query($connect, 'delete from Tour where ID = '.$id);
    echo '<p class="report">Deleting...</p>';
    echo '<script>window.location.replace("index.php?page=tour-edit");</script>';
  }

  if(isset($_POST['edit'])){
    $dateError = $placeError = $addressError = $linkError = '';
    $date = $place = $address = $link = '';
    $errorStyle = 'border-bottom: 1px solid rgba(189, 44, 32, 0.8);';
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

    if(empty($dateError) && empty($placeError) && empty($addressError) && empty($linkError)){
      $id = $_POST['edit'];
      mysqli_query($connect, "update Tour set Date = '".$date."', Place = '".$place."', Address = '".$address."', Link = '".$link."' where ID = '".$id."'");
      echo '<p class="report">Editing...</p>';
      echo '<script>window.location.replace("index.php?page=tour-edit");</script>';
    }
  }
?>

<h2 class="section-header">Tour</h2>
<article class="tour">
  <a class="back" href="index.php?page=tour">< Back</a>
  <?php
    $select = mysqli_query($connect, 'select * from Tour order by Date');
    while($row = mysqli_fetch_array($select)){
      $date = strtotime($row['Date']);
      $dateShow = $row['Date'];
      $month = date('F', $date);
      $day = date('d', $date);
      $dayInWeek = date('l', $date);
      $place = $row['Place'];
      $address = $row['Address'];
      $link = $row['Link'];
      $id = $row['ID'];
      echo
      '<div class="tour-edit">
        <form method ="post">
          <div class="tour-edit-form">
            <input class="tour-edit-input tour-edit-date" type="date" name="date" placeholder="DD/MM/YYYY" value="'.$dateShow.'">
            <input class="tour-edit-input tour-edit-place" type="text" name="place" placeholder="Place" value="'.$place.'">
            <input class="tour-edit-input tour-edit-place" type="text" name="address" placeholder="Address" value="'.$address.'">
            <input class="tour-edit-input tour-edit-link" type="text" name="link" placeholder="Buy Link" value="'.$link.'">
            <button class="tour-edit-submit tour-edit-button" type="submit" name="edit" value="'.$id.'">Done</button>
          </div>
        </form>
        <form method = "post">
          <button class="tour-edit-delete tour-edit-button" type="submit" name="delete" value="'.$id.'">Delete</button>
        </form>
      </div>';
    }
  ?>
</article>
