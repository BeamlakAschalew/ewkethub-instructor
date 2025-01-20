<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(base_path('views/partials/head.php')) ?>
    <title>Page not found</title>
    <link rel="stylesheet" href="<?= base_url('views/error_page.css') ?>" />
</head>

<body>
    <?php if (isset($_SESSION['instructor'])) require(base_path('views/partials/navigation.php')) ?>
    <main>
        <div class="wrapper">
            <div class="inside-wrapper">
                <img src="<?= base_url('assets/images/403.png') ?>" class="image" alt="" srcset="">
                <h1>403</h1>
                <h2>Unauthorized access</h2>
                <p>UwU whatchu doin... you can't touch that</p>
                <a href="/home" class="home-button">Take me home</a>
            </div>
        </div>
    </main>
    <?php if (isset($_SESSION['instructor'])) require(base_path('views/partials/footer.php')) ?>
    <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>