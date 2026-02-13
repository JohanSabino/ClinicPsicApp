var header = document.getElementById("header");
var navcontent = document.getElementById("nav-content");
var navaction = document.getElementById("navAction");
var toToggle = document.querySelectorAll(".toggleColour");
var desktop = window.matchMedia("(min-width: 1024px)");

var NAV_ACTION_BASE =
  "mx-auto lg:mx-0 hover:underline bg-gray-200 text-gray-900 font-bold rounded-full " +
  "mt-4 lg:mt-0 py-4 px-8 shadow-lg opacity-100 border-2 border-white " +
  "focus:outline-none focus:shadow-outline transform transition hover:scale-105 " +
  "duration-300 ease-in-out";

function lockSubscribe(scrolled) {
  if (!navaction) return;

  // Base siempre
  navaction.className = NAV_ACTION_BASE;

  // Solo si hay scroll, aplica el gradiente de la app
  if (scrolled) navaction.classList.add("nav-action-scrolled");
  else navaction.classList.remove("nav-action-scrolled");
}
function applyNavbar() {
  if (!header || !navcontent) return;

  var scrolled = window.scrollY > 10;

  // Header
  if (scrolled) {
    header.classList.add("bg-white", "shadow");
    header.classList.remove("bg-transparent");
  } else {
    header.classList.remove("bg-white", "shadow");
    header.classList.add("bg-transparent");
  }

  // Links solo en desktop
  if (desktop.matches) {
    if (scrolled) {
      for (var i = 0; i < toToggle.length; i++) {
        toToggle[i].classList.add("text-gray-800");
        toToggle[i].classList.remove("text-white");
      }
    } else {
      for (var j = 0; j < toToggle.length; j++) {
        toToggle[j].classList.add("text-white");
        toToggle[j].classList.remove("text-gray-800");
      }
    }
  }

  // No toques el bg del navcontent por scroll (evita ese cambio bg-gray-100/bg-white)
  // navcontent queda como lo define tu Blade (bg-white en mobile, lg:bg-transparent en desktop)

  lockSubscribe(scrolled);

}

document.addEventListener("DOMContentLoaded", applyNavbar);
document.addEventListener("scroll", applyNavbar);
if (desktop.addEventListener) desktop.addEventListener("change", applyNavbar);


/*Toggle dropdown list*/
/*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle");

document.onclick = check;

function check(e) {
    var target = (e && e.target) || (event && event.srcElement);

    //Nav Menu
    if (!checkParent(target, navMenuDiv)) {
        // click NOT on the menu
        if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
            } else {
                navMenuDiv.classList.add("hidden");
            }
        } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
        }
    }
}

function checkParent(t, elm) {
    while (t.parentNode) {
        if (t == elm) {
            return true;
        }
        t = t.parentNode;
    }
    return false;
}
