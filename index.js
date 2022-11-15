// Form type-specific attribute
const dvd = document.getElementById("DVD");
const furniture = document.getElementById("Furniture");
const book = document.getElementById("Book");

//Form dynamically changes when the type is switched
function Switcher(typeAttr) {
  switch (typeAttr.value) {
    //case DVD
    case "dvd":
      book.style.display = "none";
      furniture.style.display = "none";
      dvd.style.display = "block";
      break;
    //case Furniture
    case "furniture":
      book.style.display = "none";
      furniture.style.display = "block";
      dvd.style.display = "none";
      break;
    //case Book
    case "book":
      book.style.display = "block";
      furniture.style.display = "none";
      dvd.style.display = "none";
      break;
    //default
    default:
      book.style.display = "none";
      furniture.style.display = "none";
      dvd.style.display = "none";
  }
}
