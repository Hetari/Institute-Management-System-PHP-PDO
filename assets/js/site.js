const body = document.querySelector("body"),
  sidebar = body.querySelector("nav"),
  toggle = body.querySelector(".toggle"),
  searchBtn = body.querySelector(".search-box"),
  modeSwitch = body.querySelector(".toggle-switch"),
  modeText = body.querySelector(".mode-text");

// Function to set the theme preference in session storage
function setThemePreference(theme) {
  sessionStorage.setItem("theme", theme);
}

// Function to retrieve the theme preference from session storage
function getThemePreference() {
  return sessionStorage.getItem("theme");
}

// Function to apply the theme preference on page load
function applyThemePreference() {
  const theme = getThemePreference();
  if (theme === "dark") {
    body.classList.add("dark");
    modeText.innerText = "Dark mode";
  } else {
    body.classList.remove("dark");
    modeText.innerText = "Light mode";
  }
}

toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  document.querySelector("#user-collapse").classList.remove("show");
  document.querySelector("#class-collapse").classList.remove("show");
  document.querySelector("#course-collapse").classList.remove("show");
  document.querySelector("#student-collapse").classList.remove("show");
  document.querySelector("#employee-collapse").classList.remove("show");
});

searchBtn.addEventListener("click", () => {
  sidebar.classList.remove("close");
});

modeSwitch.addEventListener("click", () => {
  if (body.classList.contains("dark")) {
    body.classList.remove("dark");
    modeText.innerText = "Light mode";
    setThemePreference("light");
  } else {
    body.classList.add("dark");
    modeText.innerText = "Dark mode";
    setThemePreference("dark");
  }
});

applyThemePreference();

// ===========================
$(document).ready(function () {
  // Handle change event of the select element
  $("#entriesSelect").on("change", function () {
    const selectedEntries = $(this).val();
    $("#selectedEntriesCount").text(selectedEntries);
  });
});
