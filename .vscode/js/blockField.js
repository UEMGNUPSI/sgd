let elements = document.querySelectorAll("input")
let selects = document.querySelectorAll("select")

let btnEditar = document.getElementById("btnEditar");

elements.forEach(element => {
  element.setAttribute("disabled", "disabled")
});

selects.forEach(element => {
  element.setAttribute("disabled", "disabled")
});

btnEditar.addEventListener("click", () =>{
  elements.forEach(element => {
    element.removeAttribute("disabled")
  });
  
  selects.forEach(element => {
    element.removeAttribute("disabled")
  });
});