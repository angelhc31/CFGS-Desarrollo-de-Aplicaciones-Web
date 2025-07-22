window.onload=fadeoutErr;

function fadeoutErr() {
    var error= document.getElementById("error");
    
    setTimeout(function(){
        var intervalID = setInterval(function () {
        
        if (!error.style.opacity) {
            error.style.opacity = 1;
        }
        
        
        if (error.style.opacity > 0) {
            error.style.opacity -= 0.1;
        } 
        
        else {
            clearInterval(intervalID);
        }
        
    }, 50);
    }, 5000);
}