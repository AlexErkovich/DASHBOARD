
// Функция для переключения видимости подразделов
function toggleSubMenu(event) {
  var subMenu = event.target.nextElementSibling;
  if (subMenu) {
    subMenu.style.display =
      subMenu.style.display === "none" || subMenu.style.display === ""
        ? "block"
        : "none";
  }
}

// Добавление обработчика событий для всех ссылок
var menuItems = document.querySelectorAll("#menu ul li a");
menuItems.forEach(function (item) {
  item.addEventListener("click", toggleSubMenu);
});

function toggleMobileMenu() {
  var menu = document.querySelector("#menu ul");
  menu.classList.toggle("mobile-menu-active");
}

       

