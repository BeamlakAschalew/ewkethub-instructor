<!DOCTYPE html>
<html lang="en">

<head>
  <?php require base_path('views/partials/head.php') ?>
  <link rel="stylesheet" href="<?= base_url('views/auth/login/styles.css') ?>" />
  <title>Login as an Instructor</title>
</head>

<body>
  <main>
    <div class="wrapper">
      <div class="signup-container">
        <div class="image-wrapper">
          <img
            src="<?= base_url('assets/images/login.png') ?>"
            alt="Boy using laptop"
            class="logo" />
        </div>
        <div class="form-wrapper">
          <h1>Login and manage your courses</h1>
          <form action="/login" method="post" class="main-form">
            <div class="form-error">
              <input
                type="text"
                name="emailUsername"
                id="email-username"
                placeholder="Email or username"
                class="email-input form-input" />
              <div class="email-username-error error"></div>
            </div>
            <div class="form-error">
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
                class="password-input form-input" />
              <div class="password-error error"></div>
              <?php if (isset($errors) && !empty($errors)): ?>
                <?php foreach ($errors as $error): ?>
                  <div class="error"><?= $error ?></div><br>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <div class="action-buttons">
              <input class="submit-button" type="submit" value="Login" />
              <button class="signup-button">Signup</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="<?= base_url('views/auth/login/script.js') ?>"></script>
</body>

</html>