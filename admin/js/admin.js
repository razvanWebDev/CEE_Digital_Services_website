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

  //TEXT EDITOR
  ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
  });

  // EVENT LISTENERS
  selectAllBoxes.addEventListener("click", checkAllBoxes);
};
