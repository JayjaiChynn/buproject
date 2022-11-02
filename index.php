<?php

include_once('./config.php');

include_once('./header.php');
include_once('./footer.php');




$query = "SELECT * FROM movies ORDER BY release_date DESC LIMIT 3";

$result = mysqli_query($conn, $query);

$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);

?>


<div class="container-flouid">
  <div class="row justify-content-md-center">
    <h1 class="text-center bold m-3">New Releases In Theaters </h1>
    <?php foreach ($movies as $movie) : ?>
      <div class="container container-home d-flex flex-row no-wrap">
        <div class="col-lg-4 col-sm-1 wid">
          <div class="card z-depth-0">
            <div class="card-content center">
              <img src="./assets/images/<?= $movie['poster'] ?>" width=100%>
              <h3 class="text-center"><?= $movie['title'] ?></h3>
              <div>
                <h6 class="text-center">Released Date :<?= $movie['release_date'] ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>