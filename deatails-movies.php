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

echo "<br>";
echo $movie['title'];
echo "<br>";

echo $movie['description'];



include_once('./footer.php');
