window.addEventListener("DOMContentLoaded", (event) => {
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

function confirmDeletion(event) {
  event.preventDefault();

  var userConfirmation = confirm(
    "Êtes-vous sûr de vouloir supprimer cet élément ?"
  );

  if (userConfirmation) {
    window.location.href = event.currentTarget.href;
  }
}

function applyStyleOnScroll(targetSelector, buttonSelector, styleClass) {
  var targetElement = document.querySelector(targetSelector);
  var buttonElement = document.querySelector(buttonSelector);

  if (!targetElement || !buttonElement) {
    console.error("Les sélecteurs fournis ne correspondent à aucun élément.");
    return;
  }

  function checkVisibility() {
    var targetPosition = targetElement.getBoundingClientRect();
    var isVisible =
      targetPosition.top >= 0 && targetPosition.bottom <= window.innerHeight;

    if (isVisible) {
      buttonElement.classList.add(styleClass);
    } else {
      buttonElement.classList.remove(styleClass);
    }
  }

  window.addEventListener("scroll", checkVisibility);

  checkVisibility();
}
