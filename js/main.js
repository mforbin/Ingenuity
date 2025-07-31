// Toggle Nav Visibility
document.addEventListener('DOMContentLoaded', function () {
  var menuToggle = document.getElementById('menu-toggle');
  var nav = document.getElementById('site-navigation');

  menuToggle.addEventListener('click', function () {
    var expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
    menuToggle.setAttribute('aria-expanded', !expanded);
    nav.classList.toggle('active');
  });
});

