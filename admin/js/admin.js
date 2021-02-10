window.onload = () => {
  // DOM ELEMENTS
  const selectAllBoxes = document.querySelector("#selectAllBoxes");
  const checkBoxes = document.querySelectorAll(".checkBoxes");

  //Check / uncheck all boxes
  function checkAllBoxes() {
    if (this.checked) {
      checkBoxes.forEach((checkbox) => (checkbox.checked = true));
    } else {
      checkBoxes.forEach((checkbox) => (checkbox.checked = false));
    }
  }

  //TEXT EDITORS -> https://ckeditor.com/docs/ckeditor5/latest/index.html
  const heroSubtitle = document.querySelector("#hero-subtitle");
  if (heroSubtitle != undefined && heroSubtitle != null) {
    ClassicEditor.create(heroSubtitle).catch((error) => {
      console.error(error);
    });
  }

  const body1 = document.querySelector("#body");
  if (body1 != undefined && body1 != null) {
    ClassicEditor.create(body1).catch((error) => {
      console.error("There was a problem initializing the editor.", error);
    });
  }

  const body2 = document.querySelector("#body2");
  if (body2 != undefined && body2 != null) {
    ClassicEditor.create(body2).catch((error) => {
      console.error(error);
    });
  }
  // ******************************************************************************

  // EVENT LISTENERS
  if (selectAllBoxes != undefined && selectAllBoxes != null) {
    selectAllBoxes.addEventListener("click", checkAllBoxes);
  }
};
