/* Gateway front-end behavior. */
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.gateway-menu-toggle');
  var menu = document.getElementById('gateway-primary-menu');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var isOpen = menu.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  }
});
