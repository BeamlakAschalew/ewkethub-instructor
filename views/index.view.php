<!DOCTYPE html>
<html lang="en">

<head>
  <?php require(base_path('views/partials/head.php')) ?>
  <link rel="stylesheet" href="<?= base_url('views/styles.css') ?>" />
  <title>Welcome to EwketHub</title>
</head>

<body>
  <?php require(base_path('views/partials/navigation.php')) ?>
  <main>
    <div class="wrapper">
      <div class="image-container">
        <div class="text-button-container">
          <div class="text-wrapper">
            <h1 class="welcome-title">Welcome to EwketHub!</h1>
            <p class="welcome-description">
              The best way to earn income from your knowledge!
            </p>
          </div>
          <div class="button-wrapper">
            <div class="login-bottom action-button">
              <a href="/login">Login</a>
            </div>
            <div class="signup-bottom action-button">
              <a href="/signup">Signup</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php require(base_path('views/partials/footer.php')) ?>
  <script src="./script.js"></script>
</body>

</html>