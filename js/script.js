var loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  loader.style.display = "none";
})

$(document).ready(function () {
  $('.parallax').parallax();
  $('.sidenav').sidenav();

  $('.dropdown-trigger').dropdown({
    coverTrigger: false
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const notification = urlParams.get('notification');

  const notificationElement = document.getElementById('notification');

  if (notification === 'success') {
      notificationElement.innerText = "Login successful. Redirecting to homepage...";
      setTimeout(function () {
          window.location.href = "homepage.php";
      }, 3000);
  } else if (notification === 'error') {
      // Display error message
      notificationElement.innerText = "Invalid username or password.";
      setTimeout(function () {
          notificationElement.innerText = "";
      }, 3000);
  }
});