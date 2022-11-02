<?php
include_once('./config.php');

if (isset($_POST['submit'])) {
    $errors = false;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' & password = '$password' ";
    $result = mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);

    foreach ($users as $user) {
        if ($email != $user['email']) {
            $errors = true;
            echo "email is mandatory <br>";
        };
        if ($password != $user['password']) {
            $errors = true;
            echo "password is not match <br>";
        };
        if ($email = $user['email'] & $password = $user['password']) {
            echo "Everything match! <br>";
        } else
            echo "you are not register Plese click Sign-up <br>";
    }
}


?>
<form method="post">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="login" placeholder="log-in">
</form>