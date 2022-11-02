<?php
include_once('./config.php');
include_once('./header.php');


if (isset($_POST['search'])) {
    $input = $_POST['input'];

    $query = "SELECT * FROM movies WHERE title LIKE '%$input%'";
    $result = mysqli_query($conn, $query);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);

    foreach ($movies as $movie) : ?>
        <div class="container">
            <div class="card">
                <div class="d-flex">
                    <img src="../buildup-backend/assets/images/<?= $movie['poster'] ?>" width=" 200px">
                    <div class="d-flex row">
                        <h2><?= $movie['title'] ?></h2>
                        <div><?= substr($movie['description'], 0, 30); ?></div>
                        <a href="../buildup-backend/deatails-movies.php?id=<?= $movie['id']; ?>">Detail page</a>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach;
} ?>