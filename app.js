// =====================CACHE DOM ELEMENTS=====================
const header = document.querySelector("header");

// =====================GLOBAL VARIABLES=====================
let scrollPos = 0;

// ========================HEADER============================

// Show/hade nav based on scroll direction
const showHideNav = () => {
  window.scrollY < header.offsetHeight || window.scrollY > scrollPos
    ? header.classList.remove("bottom-shaddow")
    : header.classList.add("bottom-shaddow");

  if (window.scrollY > scrollPos) {
    header.classList.remove("showNav");
    header.classList.add("hideNav");
    header.classList.add("animate");
  } else {
    header.classList.add("showNav");
    header.classList.remove("hideNav");
  }
  scrollPos = window.scrollY;
};

//=========================EVENT LISTENERS=====================
window.addEventListener("scroll", showHideNav);
window.addEventListener("load", showHideNav);
