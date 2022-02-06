<?php
use App\Services\Page;

session_start();

if (!$_SESSION["user_login"]){
    \App\Services\Router::redirect('/login');
}
?>

<!doctype html>
<html lang="en">
<?php
Page::block('head');
?>
<body>
<div class = "container mb-auto mt-5 col-3">
    <h2 class = "mb-3 text-center">Hello, <?= $_SESSION["user_login"]?></h2>
        <form action="/logout" method="post">
            <button type="submit" class="btn btn-outline-dark btn-lg d-grid col-6 mx-auto">Exit</button>
        </form>
    </div>
</div>
</body>
</html>