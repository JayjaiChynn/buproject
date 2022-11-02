<?php
include_once('./header.php');
?>
<h1>Sign-Up</h1>

<?php

if (isset($_POST['registerBtn'])) {
    $name = strip_tags(trim($_POST['name']));
    $email = trim($_POST['email']);
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];

    $errors = false;

    if (empty($name)) {
        echo "Name is mandatory!<br>";
        $errors = true;
    }

    if (empty($sanitizedEmail)) {
        echo "Email is mandatory<br>";
        $errors = true;
    } else if (!filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Email is not valid<br>";
        $errors = true;
    }

    if (empty($password)) {
        echo "Password is mandatory<br>";
        $errors = true;
    } else if ($password != $cPassword) {
        echo "Passwords are not matching<br>";
        $errors = true;
    }

    // Only if no errors 
    if (!$errors) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        include_once('./config.php');
        $query = "INSERT INTO users(name, email, password)
            VALUES('$name', '$email', '$hashPassword')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        if ($result)
            echo "<p style='color: green'>Successfully registered</p>";
        else
            echo "<p style='color: red'>Problem registering</p>";
    }
}

?>

<form method="post">
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="password" placeholder="Password"><br>
    <input type="text" name="cPassword" placeholder="Confirm password"><br>
    <input type="submit" name="registerBtn" value="Register"><br>
</form>