const form = $("form");

let isValid = true;
let fullNameError = true;
let usernameError = true;
let passwordError = true;
let repeatPasswordError = true;
let emailError = true;

$(document).ready(function () {
  $("#profileImage").on("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      console.log("File loaded");
      const reader = new FileReader();
      reader.onload = function (e) {
        $("#profilePreview").attr("src", e.target.result);
      };
      reader.readAsDataURL(file);
    }
  });

  $(".fullname-error").hide();
  $(".username-error").hide();
  $(".password-error").hide();
  $(".repeat-password-error").hide();
  $(".email-error").hide();
  form.submit(function (e) {
    e.preventDefault();
    validateSubmit();
    if (
      !fullNameError &&
      !usernameError &&
      !passwordError &&
      !repeatPasswordError &&
      !emailError
    ) {
      form.off("submit").submit();
    }
  });

  validateForm();
});

function validateForm() {
  $("#fullName").on("input", function () {
    validateName();
  });

  $("#username").on("input", function () {
    validateUsername();
  });

  $("#password").on("input", function () {
    validatePassword();
  });

  $("#passwordRepeat").on("input", function () {
    validateRepeatPassword();
  });

  $("#email").on("input", function () {
    validateEmail();
  });
}

function validateSubmit() {
  validateName();
  validateUsername();
  validatePassword();
  validateRepeatPassword();
  validateEmail();
}

function validateName() {
  let fullName = $("#fullName").val();
  if (fullName.length === 0) {
    $(".fullname-error").show();
    $(".fullname-error").text("Full name cannot be empty");
    fullNameError = true;
    return true;
  } else if (fullName.length < 3 || fullName.length > 30) {
    $(".fullname-error").show();
    $(".fullname-error").text("Length of full name must be between 3 and 30");
    fullNameError = true;
    return true;
  } else {
    $(".fullname-error").hide();
    fullNameError = false;
  }
}
function validateUsername() {
  let username = $("#username").val();
  if (username.length === 0) {
    $(".username-error").show();
    $(".username-error").text("Username cannot be empty");
    usernameError = true;
    return true;
  } else if (username.length < 5 || username.length > 20) {
    $(".username-error").show();
    $(".username-error").text("Length of username must be between 5 and 20");
    usernameError = true;
    return true;
  } else {
    $(".username-error").hide();
    usernameError = false;
  }
}
function validatePassword() {
  let password = $("#password").val();
  if (password.length === 0) {
    $(".password-error").show();
    $(".password-error").text("Password cannot be empty");
    repeatPasswordError = true;
    return true;
  } else if (password.length < 8 || password.length > 32) {
    $(".password-error").show();
    $(".password-error").text("Length of password must be between 8 and 32");
    passwordError = true;
    return true;
  } else {
    $(".password-error").hide();
    passwordError = false;
  }
}
function validateRepeatPassword() {
  let repeatatPassword = $("#passwordRepeat").val();
  let password = $("#password").val();
  if (repeatatPassword !== password) {
    $(".repeat-password-error").show();
    $(".repeat-password-error").text("Password does not match");
    repeatPasswordError = true;
    return true;
  } else {
    $(".repeat-password-error").hide();
    repeatPasswordError = false;
  }
}
function validateEmail() {
  let email = $("#email").val();
  if (!email.includes("@")) {
    $(".email-error").show();
    $(".email-error").text("Invalid email");
    emailError = true;
    return true;
  } else {
    $(".email-error").hide();
    emailError = false;
  }
}
