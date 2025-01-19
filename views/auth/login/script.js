const form = $("form");

let isValid = true;
let usernameError = true;
let passwordError = true;

$(document).ready(function () {
  $(".email-username-error").hide();
  $(".password-error").hide();

  form.submit(function (e) {
    e.preventDefault();
    validateSubmit();
    if (!usernameError && !passwordError) {
      form.off("submit").submit();
    }
  });

  validateForm();
});

function validateForm() {
  $("#email-username").on("input", function () {
    validateUsername();
  });

  $("#password").on("input", function () {
    validatePassword();
  });
}

function validateSubmit() {
  validateUsername();
  validatePassword();
}

function validateUsername() {
  let emailUsername = $("#email-username").val();
  if (emailUsername.length === 0) {
    $(".email-username-error").show();
    $(".email-username-error").text("Username or email cannot be empty");
    usernameError = true;
  } else {
    usernameError = false;
  }
}
function validatePassword() {
  let password = $("#password").val();
  if (password.length === 0) {
    $(".password-error").show();
    $(".password-error").text("Password cannot be empty");
    repeatPasswordError = true;
  } else {
    passwordError = false;
  }
}
