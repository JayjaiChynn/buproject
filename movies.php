<?php
include_once('./header.php');
include_once('./config.php');

$query = "SELECT * FROM movies";

$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<form method="GET">
    <input type="submit" value="ASC" name="ASC" />
</form>
<form method="GET">
    <input type="submit" value="DESC" name="DESC" />
</form>
<?php
if (isset($_GET['DESC'])) {
    $query = "SELECT * FROM movies ORDER BY title DESC";
    $result = mysqli_query($conn, $query);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
} ?>
<?php
if (isset($_GET['ASC'])) {
    $query = "SELECT * FROM movies ORDER BY title ASC";
    $result = mysqli_query($conn, $query);
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
} ?>

<div>
    <?php foreach ($movies as $movie) : ?>
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
</div>
<?php endforeach; ?>