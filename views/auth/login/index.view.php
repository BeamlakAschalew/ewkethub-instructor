<!DOCTYPE html>
<html lang="en">

<head>
  <?php require base_path('views/partials/head.php') ?>
  <link rel="stylesheet" href="<?= base_url('views/auth/login/styles.css') ?>" />
  <title>Login as an Instructor</title>
</head>

<body>
  <?php require base_path('views/partials/navigation.php') ?>
  <main>
    <div class="wrapper">
      <div class="signup-container">
        <div class="image-wrapper">
          <img
            src="../../../assets/images/edit.png"
            alt="Girl studying"
            class="logo" />
        </div>
        <div class="form-wrapper">
          <h1>Login and manage your courses</h1>
          <form action="#" method="post" class="main-form">
            <input
              type="text"
              name="email"
              id="email"
              placeholder="Email or username"
              class="email-input form-input" />
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Password"
              class="password-input form-input" />
            <div class="action-buttons">
              <a class="submit-button" href="../../home/index.html">Login</a>
              <button class="signup-button">Signup</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php require base_path('views/partials/footer.php') ?>
  <script src="../../../navigation.js"></script>
</body>

</html>