function upImagesFunction() {
    var x = document.getElementById("userImages");
    var y = document.getElementById("likedImages");
    
    if (x.style.display === "none") {
      x.style.display = "grid";
      y.style.display = "none";
    }
  }

function likedImagesFunction() {
    var x = document.getElementById("userImages");
    var y = document.getElementById("likedImages");
    
    if (y.style.display === "none") {
      y.style.display = "grid";
      x.style.display = "none";
    }
}