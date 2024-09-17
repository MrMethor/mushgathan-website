<h2 class="section-header">Tour</h2>
<article class="tour">
  <?php
    if($_SESSION['privilage'] == 'A' || $_SESSION['privilage'] == 'B'){
      echo
      '<div class="tour-admin-buttons">
        <a class="tour-admin-button" href="index.php?page=tour-add">Add</a>
        <a class="tour-admin-button" href="index.php?page=tour-edit">Edit</a>
      </div>';
    }
    $select = mysqli_query($connect, 'select * from Tour order by Date');
    while($row = mysqli_fetch_array($select)){
      $date = strtotime($row['Date']);
      $month = date('F', $date);
      $day = date('d', $date);
      $dayInWeek = date('l', $date);
      $place = $row['Place'];
      $address = $row['Address'];
      $link = $row['Link'];
      $id = $row['ID'];
      echo
      '<div class="tour-concert">
        <div class="tour-concert-date">
          <p class="tour-concert-date-month">'.$month.'</p>
          <p class="tour-concert-date-day1">'.$day.'</p>
          <p class="tour-concert-date-day2">'.$dayInWeek.'</p>
        </div>
        <div class="tour-concert-place">
          <p class="tour-concert-place-place">'.$place.'</p>
          <p class="tour-concert-place-city">'.$address.'</p>
        </div>
        <div class="tour-concert-link">
          <a class="tour-concert-link-button" href="'.$link.'" target="_blank">Buy Ticket</a>
        </div>
      </div>';
    }
  ?>
</article>
