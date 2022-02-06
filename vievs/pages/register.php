<?php
use App\Services\Page;

session_start();

if ($_SESSION["user_login"]){
    \App\Services\Router::redirect('/main');
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    Page::block('head');
    ?>
</head>
<body>
    <div class = "container mb-auto mt-4 col-3">
        <div class="border border-dark rounded p-4">
            <form action="#" method="post" id="form">
                <div class="mb-3">
                    <label class="form-label">Login</label>
                    <input type="text" name="login" class="form-control" id="Login">
                    <label class="alert-danger loginErr err"></label>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control _req" id="Password">
                    <label class="alert-danger passwordErr err"></label>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm password</label>
                    <input type="password" name="passwordConfirm" class="form-control" id="PasswordConfirm">
                    <label class="alert-danger passwordConfErr err"></label>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control _req" id="Email" aria-describedby="emailHelp">
                    <label class="alert-danger emailErr err"></label>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="userName" class="form-control _req" id="UserName">
                    <label class="alert-danger userNameErr err"></label>
                </div>
                <button type="submit" class="reg-btn btn btn-outline-dark btn-lg d-grid col-6 mx-auto">Sign-up</button>
                <label class="form-label msg alert-danger d-grid col-6 mx-auto text-center mt-2"></label>
                <a  class="btn btn-link d-grid col-6 mx-auto mt-2" href="/login">Back</a>
            </form>
        </div>
    </div>
    <noscript>
        <label class="form-label msg alert-danger d-grid col-6 mx-auto text-center mt-2">You cannot login without javascript enabled.</label>
    </noscript>
    <script src="../../assets/js/jquery-3.6.0.js"></script>
    <script src="../../assets/js/main.js"></script>

</body>
</html>