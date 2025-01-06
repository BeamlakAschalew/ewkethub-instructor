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
          <form action="signup" method="post" class="main-form" enctype="multipart/form-data">
            <div class="profile-image-container">
              <label for="profileImage">
                <div class="profile-image-preview">
                  <img id="profilePreview" src="placeholder.jpg" alt="Profile Preview">
                </div>
              </label>
              <label for="profileImage" class="profile-image-label">Upload Profile Image</label>
              <input type="file" name="profileImage" id="profileImage" class="profile-image-input" accept="image/*">
            </div>
            <div class="form-error">
              <input
                type="text"
                name="fullName"
                id="fullName"
                class="fullName-input form-input"
                placeholder="Full name" />
              <div class="fullname-error error"></div>
            </div>
            <div class="form-error">
              <input
                type="email"
                name="email"
                id="email"
                placeholder="Email"
                class="email-input form-input" />
              <div class="email-error error">Email error</div>
            </div>
            <div class="form-error">
              <input
                type="text"
                name="username"
                id="username"
                placeholder="Username"
                class="username-input form-input" />
              <div class="username-error error">Username error</div>
            </div>
            <div class="form-error">
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
                class="password-input form-input" />
              <div class="password-error error">Password error</div>
            </div>
            <div class="form-error">
              <input
                type="password"
                name="passwordRepeat"
                id="passwordRepeat"
                placeholder="Repeat password"
                class="password-input form-input" />
              <div class="repeat-password-error error">Repeat password error</div>
            </div>
            <div class="form-error">
              <input
                type="text"
                name="bio"
                id="bio"
                placeholder="Bio"
                class="bio-input form-input" />
              <div class="bio-error error">Bio error</div>
            </div>
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
  <script src="<?= base_url('views/auth/signup/script.js') ?>"></script>
</body>

</html>