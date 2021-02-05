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
  ClassicEditor.create(document.querySelector("#hero-subtitle")).catch(
    (error) => {
      console.error(error);
    }
  );

  ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
  });

  ClassicEditor.create(document.querySelector("#hero-date")).catch((error) => {
    console.error(error);
  });

  // EVENT LISTENERS
  selectAllBoxes.addEventListener("click", checkAllBoxes);
};
