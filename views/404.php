<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <title>Page not found</title>
    <link rel="stylesheet" href="<?= base_url('views/error_page.css') ?>" />
</head>

<body>
    <?php require(base_path('views/partials/navigation.php')) ?>
    <main>
        <div class="wrapper">
            <div class="inside-wrapper">
                <img src="<?= base_url('assets/images/404.png') ?>" class="image" alt="" srcset="">
                <h1>404</h1>
                <h2>Page not found</h2>
                <p>Sorry, the page you are looking for could not be found.</p>
                <a href="/home" class="home-button">Take me home</a>
            </div>
        </div>
    </main>
    <?php require(base_path('views/partials/footer.php')) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>