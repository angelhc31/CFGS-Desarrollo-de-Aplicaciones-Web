window.onload=fadeoutWarning;
                            
function fadeoutWarning() {
    var warning= document.getElementById("warning");
    
    setTimeout(function(){
        var intervalID = setInterval(function () {
        
        if (!warning.style.opacity) {
            warning.style.opacity = 1;
        }
        
        
        if (warning.style.opacity > 0) {
            warning.style.opacity -= 0.1;
        } 
        
        else {
            clearInterval(intervalID);
        }
        
    }, 50);
    }, 5000);
}