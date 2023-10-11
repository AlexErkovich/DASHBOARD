document.addEventListener("DOMContentLoaded", function() {
    var url = window.location.pathname;
    var menuItems = document.getElementById("menu").getElementsByTagName("a");
  
    for (var i = 0; i < menuItems.length; i++) {
      if (menuItems[i].getAttribute("href") === url) {
        menuItems[i].classList.add("active");
        break;
      }
    }
  });
  