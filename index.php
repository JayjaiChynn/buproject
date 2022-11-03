<?php
include_once('./config.php');

include_once('./header.php');


$query = "SELECT * FROM movies ORDER BY release_date DESC LIMIT 3";

$result = mysqli_query($conn, $query);

$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);

?>
<section class="vh-100" gradient-custom style=" background-color: #121212;">
  <div class="container py-5 h-100">
    <h1 class="fw-bold text-light text-center m-3">New Releases In Theaters </h1>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <?php foreach ($movies as $movie) : ?>
        <div class="col-12 col-lg-4">
          <div class="card card-home z-depth-0 ">
            <div class="img-container">
              <img src="./assets/images/<?= $movie['poster'] ?>">
            </div>
            <div class="card-content center">

              <h3 class="text-center"><?= $movie['title'] ?></h3>
              <div>
                <h6 class="text-center">Released Date :<?= $movie['release_date'] ?></h6>
              </div>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php include_once('./footer.php'); ?>