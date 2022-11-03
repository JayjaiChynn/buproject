<?php
include_once('./config.php');
include_once('./header.php');

$query = "SELECT * FROM directors";

$result = mysqli_query($conn, $query);
$directors = mysqli_fetch_all($result, MYSQLI_ASSOC);


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

<section class="vh-100" gradient-custom style=" background-color: #000;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-4 ">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-insert card-body p-4 text-center" style="height:550px ;">
                        <h2 class="fw-bold mb-2 text-uppercase">Insert Movies</h2>
                        <form class="form-outline form-white mb-4" method="POST">
                            <input class="form-control" type="text" name="title" placeholder="title"><br>
                            <input class="form-control" type="text" name="poster" placeholder="poster"><br>
                            <input class="form-control" type="date" name="release_date" placeholder="release_date"><br>

                            <select class="form-control" name="option">
                                <?php foreach ($directors as $director) : ?>
                                    <option value="<?= $director['id'] ?>"><?= $director['first_name'] . " " . $director['last_name'] ?>
                                    </option><br>
                                <?php endforeach; ?>
                            </select>

                            <div class="p-3">
                                <textarea class="form-control z-depth-1" rows="5" name="description" placeholder="description"></textarea><br>
                            </div>
                            <input class="btn btn-secondary btn-lg px-5" type="submit" name="add" value="add"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('./footer.php'); ?>