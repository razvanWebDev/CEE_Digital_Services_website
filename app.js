// =====================CACHE DOM ELEMENTS=====================
const header = document.querySelector("header");

// =====================GLOBAL VARIABLES=====================
let scrollPos = 0;

// ========================HEADER============================
// Show/hade nav based on scroll direction
const showHideNav = () => {
  if (window.scrollY < 100) {
    header.classList.remove("showNav");
    header.classList.remove("hideNav");
  } else if (window.scrollY > scrollPos) {
    header.classList.remove("showNav");
    header.classList.add("hideNav");
  } else {
    header.classList.add("showNav");
    header.classList.remove("hideNav");
  }
  scrollPos = window.scrollY;
};

//=========================EVENT LISTENERS=====================
window.addEventListener("scroll", showHideNav);
