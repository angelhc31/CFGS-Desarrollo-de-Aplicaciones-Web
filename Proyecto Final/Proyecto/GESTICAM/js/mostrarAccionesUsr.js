var div = document.querySelector("#options-card"),
button = document.querySelector("#clickAvatar");

window.addEventListener("click", function(event){
var objetivo = event.target;
if (objetivo != div && objetivo != button) div.style.display = "none";
}, false);

button.addEventListener("click", function(){
var visible = getComputedStyle(div).display;
div.style.display = visible == "block" ? "none" : "block";
}, false);