<?php
use App\Services\Page;

session_start();

if ($_SESSION["user_login"]){
    \App\Services\Router::redirect('/main');
}
?>

<!doctype html>
<html lang="en">
<?php
Page::block('head');
?>
<body>
    <div class = "container mb-auto mt-5 col-3">
        <div class="border border-dark rounded p-4">
            <h2 class = "mb-3 text-center">Sign-in</h2>
            <form action="#" method="post" id="form">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Login</label>
                    <input type="text" class="form-control" name="login"  aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" >
                </div>
                <button type="submit" class="login-btn btn btn-outline-dark btn-lg d-grid col-6 mx-auto">Login</button>
                <a  class="btn btn-link d-grid col-6 mx-auto mt-2" href="/register">Sign up</a>
                <label class="form-label msg alert-danger d-grid col-6 mx-auto text-center mt-2"></label>
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