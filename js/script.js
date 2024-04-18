var loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  loader.style.display = "none";
})

$(document).ready(function () {
  $('.parallax').parallax();
  $('.sidenav').sidenav();
});