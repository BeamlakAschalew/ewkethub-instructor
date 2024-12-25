<!DOCTYPE html>
<html lang="en">

<head>
  <?php require base_path('views/partials/head.php') ?>
  <title>Signup as an Instructor</title>
  <link rel="stylesheet" href="<?= base_url('views/auth/signup/styles.css') ?>" />
</head>

<body>
  <?php require base_path('views/partials/navigation.php') ?>
  <main>
    <div class="wrapper">
      <div class="signup-container">
        <div class="image-wrapper">
          <img
            src="../../../assets/images/study.png"
            alt="Girl studying"
            class="logo" />
        </div>
        <div class="form-wrapper">
          <h1>Signup and start teaching</h1>
          <form action="#" method="post" class="main-form">
            <input
              type="text"
              name="fullName"
              id="fullName"
              class="fullName-input form-input"
              placeholder="Full name" />
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Email"
              class="email-input form-input" />
            <input
              type="text"
              name="username"
              id="username"
              placeholder="Username"
              class="username-input form-input" />
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Password"
              class="password-input form-input" />
            <input
              type="password"
              name="passwordRepeat"
              id="passwordRepeat"
              placeholder="Repeat password"
              class="password-input form-input" />
            <div class="action-buttons">
              <input class="submit-button" type="submit" value="Signup" />
              <button class="login-button">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php require base_path('views/partials/footer.php') ?>
  <script src="<?= base_url('views/script.js') ?>"></script>
</body>

</html>