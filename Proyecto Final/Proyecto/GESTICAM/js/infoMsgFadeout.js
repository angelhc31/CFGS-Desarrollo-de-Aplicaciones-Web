var info= document.getElementById("info");
function mostrarInfo(){
    info.style.display = "block";
    info.style.opacity = 1;
    fadeoutInfo();
}
                            
function fadeoutInfo() {
    if (!info.style.opacity) {
        info.style.opacity = 1;
    }
    setTimeout(function(){
        var intervalID = setInterval(function () {
        
        if (info.style.opacity > 0) {
            info.style.opacity -= 0.1;
        } 
        
        else {
            clearInterval(intervalID);
        }
        
    }, 50);
    }, 5000);


}