window.onload = () => {
  ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
  });
};
