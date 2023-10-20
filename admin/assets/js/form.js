const first_name = $("#fname");
const last_name = $("#lname");
const something_name = $("#name");
const shortcut = $("#shortcut");
const phone = $("#phone");
const username = $("#username");
const email_login = $("#email-login");
const email_register = $("#email");
const password_login = $("#password-login");
const salary = $("#salary");
const fee = $("#fees");

something_name.on("blur", validateName);
shortcut.on("blur", validateShortcut);
first_name.on("blur", validateName);
last_name.on("blur", validateName);
username.on("blur", validateUsername);
phone.on("blur", validatePhone);
email_register.on("blur", validateEmail);
email_login.on("blur", validateEmail);
password_login.on("blur", validatePassword);
salary.on("blur", validateSalary);
fee.on("blur", validateSalary);

$(".gender").on("change", function () {
  $(this).valid();
});

const reSpaces = /^\S*$/;
const reName = /^[a-z ,.'-]{3,30}$/;
const reShortcut = /^[a-z ,.'-]{1,20}$/;
const rePhone = /^(?:(\d{3}))?[- ]?(\d{3})[- ]?(\d{3})$/;
const reUsername = /^[a-zA-Z][a-zA-Z0-9_]{5,30}$/;
const reEmail = /^([_\-\.a-zA-Z0-9]+)@([_\-\.a-zA-Z]+)\.([a-zA-Z]){2,4}$/;
const rePassword =
  /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/;
const reSalary = /^(?!0$)(?!.*[.,\/-])\d{1,6}$/;

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

function validatePassword(e) {
  const input = $(this).val().toLowerCase();
  return validating(reName, input, $(this));
}

function validateShortcut(e) {
  const input = $(this).val().toLowerCase();
  return validating(reShortcut, input, $(this));
}

function validateName(e) {
  const input = $(this).val().toLowerCase();
  return validating(reName, input, $(this));
}

function validateEmail(e) {
  let input = $(this).val().trim().toLowerCase();
  if (!validating(reEmail, input, $(this))) {
    $("#emailFeedback").html("Invalid email format!");
    return false;
  }
  return validating(reEmail, input, $(this));
}

function validateUsername(e) {
  let input = $(this).val().trim().toLowerCase();
  if (
    !validating(reUsername, input, username) &&
    $("#username").val().length < 5
  ) {
    $("#usernameFeedback").html("Short username!");
  }

  if (
    !validating(reUsername, input, username) &&
    $("#username").val().length > 20
  ) {
    $("#usernameFeedback").html("Long username!");
  }

  if (
    !validating(reUsername, input, username) &&
    !/^[a-zA-Z0-9_]+$/.test(input)
  ) {
    $("#usernameFeedback").html("Invalid characters in username!");
  }

  if (!validating(reUsername, input, username) && /^\d/.test(input)) {
    $("#usernameFeedback").html("The first character cannot be a number!");
  }
  return validating(reUsername, input, username);
}

function validatePhone(e) {
  /* if (phone.val().trim() === "") return true;
  else*/
  return validating(rePhone, phone.val(), phone);
}

function passwordCheck(password) {
  if (password.match(/(?=.*[0-9])/)) {
    strength += 1;
  }
  if (password.match(/(?=.*[!%&@#$^*?_~<>])/)) {
    strength += 1;
  }
  if (password.match(/(?=.*[A-Za-z])/)) {
    strength += 1;
  }
  if (password.length >= 8 && password.length <= 25) {
    strength += 1;
  }
  displayBar(strength);
  return strength == 4;
}

function displayBar(strength) {
  $(".password-strength-group").attr("data-strength", strength);
}

function passwordConfirmationCheck(password, confirmation) {
  return password === confirmation;
}

function validateSalary(e) {
  let input = $(this).val().trim().toLowerCase();
  return validating(reSalary, input, $(this));
}

// sourcery skip: avoid-using-var
var is_password_valid = false;
var is_password_confirmed = false;

$("#password").keyup(function () {
  strength = 0;
  var password = $(this).val();

  is_password_valid = passwordCheck(password);
  is_password_confirmed = passwordConfirmationCheck(
    password,
    $("#conPassword").val()
  );
});

$("#conPassword").keyup(function () {
  var confirmation = $(this).val();
  var password = $("#password").val();

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
          !validatePassword() ||
          !validateSalary()
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
