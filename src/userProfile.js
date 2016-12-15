var buttons = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < buttons.length; i++) {
    buttons[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}