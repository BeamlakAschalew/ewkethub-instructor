<!DOCTYPE html>
<html lang="en">

<head>
  <?php require(base_path('views/partials/head.php')) ?>
  <link rel="stylesheet" href="<?= base_url('views/styles.css') ?>" />
  <title>Welcome to EwketHub</title>
</head>

<body>
  <main>
    <div class="wrapper">
      <div class="text-container">
        <h1>Welcome to EwketHub</h1>
        <h2>Create an account and start earning money from your skills!</h2>
        <div class="action-container">
          <a class="button login" href="/login">Login</a>
          <a class="button signup" href="/signup">Signup</a>
        </div>
      </div>
      <div class="image-container">
        <img src="assets/images/video.png" class="image" alt="" srcset="">
      </div>
    </div>
  </main>
  <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>