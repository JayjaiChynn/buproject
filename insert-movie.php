<?php
include_once('./config.php');
include_once('./header.php');

$query = "SELECT * FROM directors";

$result = mysqli_query($conn, $query);
$directors = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<h1>Insert Movies</h1>

<?php
if (isset($_POST['add'])) {
    $title = strip_tags(trim($_POST['title']));
    $poster = strip_tags(trim($_POST['poster']));
    $textarea = strip_tags(trim($_POST['description']));
    $date = $_POST['release_date'];
    $value = $_POST['option'];

    $errors = false;

    if (empty($title)) {
        echo "title is mandatory!<br>";
        $errors = true;
    }
    if (empty($poster)) {
        echo "poster is mandatory<br>";
        $errors = true;
    }
    if (empty($value)) {
        echo "Choose the director<br>";
        $errors = true;
    }
    if (empty($textarea)) {
        echo "Need description for movie<br>";
        $errors = true;
    }
    if (empty($date)) {
        echo "Need release date<br>";
        $errors = true;
    }

    // Only if no errors 
    if (!$errors) {
        // include_once('./config.php');
        $query1 = "INSERT INTO movies(title,director_id, description, release_date, poster)
        VALUES('$title','$value', '$textarea', '$date','$poster')";
        $result1 = mysqli_query($conn, $query1);
        mysqli_close($conn);

        if ($result1)
            echo "<p style='color: green'>Successfully added</p>";
        else
            echo "<p style='color: red'>Problem add</p>";
    }
}

?>

<form method="post">
    <input type="text" name="title" placeholder="title"><br>
    <input type="text" name="poster" placeholder="poster"><br>
    <input type="date" name="release_date" placeholder="release_date"><br>
    <select name="option">
        <?php foreach ($directors as $director) : ?>
            <option value="<?= $director['id'] ?>"><?= $director['first_name'] . " " . $director['last_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div>
        <textarea name="description" placeholder="description"></textarea><br>
        <input type="submit" name="add" value="add"><br>
    </div>
</form>