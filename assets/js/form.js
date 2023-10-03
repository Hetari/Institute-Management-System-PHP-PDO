const first_name = $("#fname-register");
const last_name = $("#lname-register");
const phone = $("#phone-register");
const username = $("#username-register");
const email_login = $("#email-login");
const email_register = $("#email-register");
const password_login = $("password-login");

first_name.on("blur", validateName);
last_name.on("blur", validateName);
username.on("blur", validateUsername);
phone.on("blur", validatePhone);
email_register.on("blur", validateEmail);
email_login.on("blur", validateEmail);
password_login.on("blur", validatePassword);

$(".gender-register").on("change", function () {
  $(this).valid();
});

const reSpaces = /^\S*$/;
const reName = /^[a-z ,.'-]{3,30}$/;
const rePhone = /^(?:(\d{3}))?[- ]?(\d{3})[- ]?(\d{3})$/;
const reUsername = /^[A-Za-z][A-Za-z0-9_]{3,30}$/;
const reEmail = /^([_\-\.a-zA-Z0-9]+)@([_\-\.a-zA-Z]+)\.([a-zA-Z]){2,4}$/;
const rePassword =
  /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/;

function validatePassword(e) {
  const input = $(this).val().toLowerCase();
  validating(reName, input, $(this));
}

function validating(re, input, element) {
  if (reSpaces.test(input) && re.test(input)) {
    element.removeClass("is-invalid");
    element.addClass("is-valid");
    return true;
  } else {
    element.addClass("is-invalid");
    element.removeClass("is-valid");
    return false;
  }
}

function validateName(e) {
  const input = $(this).val().toLowerCase();
  validating(reName, input, $(this));
}

function validateEmail(e) {
  let input = $(this).val().trim().toLowerCase();
  return validating(reEmail, input, $(this));
}

function validateUsername(e) {
  let input = username.val().toLowerCase();
  return validating(reUsername, input, username);
}

function validatePhone(e) {
  /* if (phone.val().trim() === "") return true;
  else*/
  return validating(rePhone, phone.val(), phone);
}

function passwordCheck(password) {
  if (password.length >= 8 && password.length <= 25) strength += 1;
  if (password.match(/(?=.*[0-9])/)) strength += 1;
  if (password.match(/(?=.*[!%&@#$^*?_~<>])/)) strength += 1;
  if (password.match(/(?=.*[A-Za-z])/)) strength += 1;
  displayBar(strength);
  return strength == 4;
}

function displayBar(strength) {
  $(".password-strength-group").attr("data-strength", strength);
  // if (strength == 0) $("#pass-word").text("Weak");
  // if (strength == 1) $("#pass-word").text("Weak");
  // if (strength == 2) $("#pass-word").text("Weak");
  // if (strength == 3) $("#pass-word").text("Weak");
  // if (strength == 4) $("#pass-word").text("Weak");
}

function passwordConfirmationCheck(password, confirmation) {
  return password === confirmation;
}

var is_password_valid = false;
var is_password_confirmed = false;

$("#password-register").keyup(function () {
  strength = 0;
  var password = $(this).val();

  is_password_valid = passwordCheck(password);
  is_password_confirmed = passwordConfirmationCheck(
    password,
    $("#conPassword-register").val()
  );
});

$("#conPassword-register").keyup(function () {
  var confirmation = $(this).val();
  var password = $("#password-register").val();

  is_password_confirmed = passwordConfirmationCheck(password, confirmation);
});

(() => {
  "use strict";

  const forms = document.querySelectorAll(".needs-validation");

  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (
          !form.checkValidity() ||
          !validateEmail() ||
          !validateUsername() ||
          !is_password_valid ||
          !validatePhone() ||
          !validateName() ||
          !is_password_confirmed ||
          !validatePassword()
        ) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          form.classList.add("was-validated");
        }
      },
      false
    );
  });
})();
