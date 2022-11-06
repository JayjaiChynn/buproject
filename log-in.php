<?php
include_once('./config.php');
include_once('./header.php');


if (isset($_POST['login'])) {
    $errors = [];


    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);

    mysqli_close($conn);

    if (!$user) {

        $logged = false;
        $errors['email'] = "email does not exsist <br>";
    } else {

        $hash = $user["password"];
        if (password_verify($password, $hash)) {

            $logged = true;
            echo "welcom back " . $user['name'] . " You are succesfully loged in ";
        } else {

            $logged = false;
            $errors['password'] = "password is wrong <br>";
        }
    }

    if ($logged) {

        $_SESSION['userName'] = $user['name'];
        $_SESSION['userEmail'] = $user['email'];
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userPicture'] = $user['picture'];
        $msg = "<span class ='success'>You Are successfully logied in.  </span>";

        header('LOCATION: account.php');
    } else {

        $msg = "<span class ='error'>you entered a wrong password try again please.  </span>";
    }
}
?>

<section class=" login vh-100 gradient-custom" style=" background-color: #212529;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center login">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your Email and password!</p>
                            <form method="post">
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" />

                                    <p> <?php
                                        if (isset($errors['email'])) {
                                            echo $errors['email'];
                                        }  ?>
                                    </p>

                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" />
                                    <p> <?php
                                        if (isset($errors['password'])) {
                                            echo $errors['password'];
                                        }  ?>
                                    </p>

                                </div>
                                <input class="btn btn-dark btn-lg px-5" type="submit" name="login" value="Login">
                            </form>
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
<?php include_once('./footer.php') ?>