<?php
  if(isset($_POST['delete'])){
    $id = $_POST['delete'];
    mysqli_query($connect, 'delete from Users where ID = '.$id);
    echo '<p class="report">Deleting...</p>';
    echo '<script>window.location.replace("index.php?page=search");</script>';
  }
?>

<h2 class="section-header">Search</h2>
<article class="search">
  <form method="post">
    <div class="search-bar">
      <input class="search-bar-input" type="text" placeholder="Search an User.." name="search">
      <button class="search-bar-button" type="submit" name="submit"><img src="images/search.png" alt="search" width="20px" height="20px"></button>
    </div>
  </form>
</article>

<?php
  $search = $_POST['search'];
  $minLength = 2;
  if(strlen($search) > $minLength){
    $find = mysqli_query($connect, "select * from Users where (Username like '%".$search."%')");
    if(mysqli_num_rows($find) > 0){
      while($row = mysqli_fetch_array($find)){
        $id = $row["ID"];
        $username = $row["Username"];
        $date = $row["Date"];
        $dateAll = explode('-', $date);
        if($row['Privilage'] == "A"){
          $border = 'border: 2px solid #ffcc00';
        }
        else if($row['Privilage'] == "B"){
          $border = 'border: 2px solid #ff0000';
        }
        else{
          $border = 'border: 2px solid rgba(0, 0, 0, 0)';
        }
        echo
        '<div class="search-result">
          <div style="'.$border.'" class="search-result-pfp">
            <img src="pfps/'.$id.'.jpg?'.time().'" alt="pfp" height="100%" width="100%">
          </div>
          <div class="search-result-text">
            <h3 class="search-result-text-name">'.$username.'</h3>
            <p class="search-result-text-date">'.$dateAll[2].'/'.$dateAll[1].'/'.$dateAll[0].'</p>
          </div>';
        if($_SESSION['privilage'] == 'A'){
          echo '<form method=post>
                  <button class="search-result-delete" type="submit" name="delete" value="'.$id.'">Delete</button>
              </form>';
        }
        echo '</div>';
      }
    }
    else{
      echo '<p class="search-noresults">No users exist with this username</p>';
    }
  }
?>
