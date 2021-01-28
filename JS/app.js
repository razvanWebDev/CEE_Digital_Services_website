window.onload = () => {
  console.log("BIG LOADs");
  // =====================CACHE DOM ELEMENTS=====================
  const header = document.querySelector("header");
  const body = document.querySelector("body");
  const hamburger = document.querySelector("#hamburger");
  const hamburgerLines = document.querySelectorAll("#hamburger div");
  const nav = document.querySelector(".header-menu");

  // FORMS
  const reuiredFields = document.querySelectorAll(".required-field");
  const email = document.querySelector(".email");
  const formSubmitBtn = document.querySelector(".form-submit-button");
  const requiredSelect = document.querySelectorAll(".required-select");

  // =====================GLOBAL VARIABLES=====================
  let scrollPos = 0;

  // ========================HEADER============================

  // Show/hade nav based on scroll direction
  const showHideNav = () => {
    window.scrollY < 1 || window.scrollY > scrollPos
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

  //Navbar on mobile===========
  const navToggle = () => {
    nav.classList.toggle("show-nav");
    if (nav.classList.contains("show-nav")) {
      nav.style.animation = `navSlideIn 0.7s forwards`;
      whiteHamburger();
    } else {
      nav.style.animation = `navSlideOut 0.7s`;
      blueHamburger();
    }
    hamburger.classList.toggle("toggle-burger");
  };

  const blueHamburger = () => {
    hamburgerLines.forEach((line) => {
      line.classList.remove("white-bg");
      line.classList.add("blue-bg");
    });
  };

  const whiteHamburger = () => {
    hamburgerLines.forEach((line) => {
      line.classList.remove("blue-bg");
      line.classList.add("white-bg");
    });
  };

  //====================================custom select droptown button=========================
  var x, i, j, l, ll, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("custom-select");
  l = x.length;
  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
      /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function (e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }
  function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
  except the current select box:*/
    var x,
      y,
      i,
      xl,
      yl,
      arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i);
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }

  // ==============================Forms validation======================
  function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  const validateFormInput = (condition, item) => {
    item.style.backgroundColor = "transparent";
    if (condition) {
      event.preventDefault();
      item.style.backgroundColor = "#ff110033";
    }
  };

  function validateContactForm(event) {
    // check required inputs
    reuiredFields.forEach((field) => {
      validateFormInput(field.value == "", field);
    });
    reuiredFields.forEach((field) => {
      field.addEventListener("input", function () {
        validateFormInput(field.value == "", field);
      });
    });

    // validate email
    validateFormInput(validateEmail(email.value) == false, email);
    email.addEventListener("input", function () {
      validateFormInput(validateEmail(email.value) == false, email);
    });

    // validate select
    requiredSelect.forEach((select) => {
      console.log(select);
      validateFormInput(
        select.value == "0" || select.value == undefined,
        select
      );
    });
  }

  //=========================EVENT LISTENERS=====================
  window.addEventListener("scroll", showHideNav);
  window.addEventListener("load", showHideNav);

  // show nav on hamburger tap
  hamburger.addEventListener("click", navToggle);

  /*if the user clicks anywhere outside the select box, then close all select boxes:*/
  document.addEventListener("click", closeAllSelect);
  //Form validation
  formSubmitBtn.addEventListener("click", validateContactForm);
};
