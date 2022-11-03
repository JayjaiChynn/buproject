<?php
include_once('./config.php');
include_once('./header.php');


if (isset($_POST['submit'])) {
    $errors = false;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' & password = '$password'";
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

<section class="vh-100" gradient-custom style=" background-color: #212529;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center login">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your Email and password!</p>
                            <div class="form-outline form-white mb-4">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" />

                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />

                            </div>
                            <button class="btn btn-dark btn-lg px-5" type="submit" name="login">Login</button>
                        </div>
                        <div>
                            <p class="mb-0">Don't have an account? <a class="btn" href="register.php" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('./footer.php'); ?>