<?php
include_once('./header.php');
?>


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


<section class="vh-100" gradient-custom>
    <div class="container-registration container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card p-5" style="border-radius: 1rem;">
                    <form class="form" method="POST">
                        <div class="form-group">
                            <h2 class="text-center m-2 p-2">Create a new account</h2>
                        </div>
                        <div class="form-group m-2">

                            <input class="form-control" type="text" name="name" placeholder="Name">
                        </div>
                        <div class="form-group m-2">

                            <input class="form-control" type="text" name="email" placeholder="email">
                        </div>
                        <div class="form-group m-2">

                            <input class="form-control" type="text" name="password" placeholder="Password">
                        </div>
                        <div class="form-group m-2">

                            <input class="form-control" type="text" name="cPassword" placeholder="Confirm password">
                        </div>
                        <input class="btn btn-dark btn-lg px-5" type="submit" name="registerBtn" value="Sign Up">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('./footer.php'); ?>