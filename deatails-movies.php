<?php
include_once('./header.php');
include_once('./config.php');

$query = "SELECT *
FROM movies m
INNER JOIN directors d ON m.director_id = d.id 
WHERE m.id = " . $_GET['id'];

$result = mysqli_query($conn, $query);
$movie = mysqli_fetch_assoc($result);
mysqli_close($conn);


?>

<div class="container-flouid container-details d-flex justify-content-center">
  <div class="card card-details">
    <img src="./assets/images/<?= $movie['poster'] ?>" width="250px">
    <h4 class="card-title text-light fw-bold text-center mt-3"><?= $movie['title'] ?></h4>
    <h6 class="card-text text-light mt-3">Released Date : <?= $movie['release_date'] ?></h6>
    <h6 class="card-text text-light mt-3">Director : <?= $movie['first_name'] . ' ' . $movie['last_name'] ?></h6>
    <h6 class="card-text text-light mt-3"><b>About</b> : <?= $movie['description'] ?></h6>
  </div>
</div>
</div>

<?php include_once('./footer.php'); ?>