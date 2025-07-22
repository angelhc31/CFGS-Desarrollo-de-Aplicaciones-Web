window.onload=fadeoutSuccess;
                            
function fadeoutSuccess() {
    var success= document.getElementById("success");
    
    setTimeout(function(){
        var intervalID = setInterval(function () {
        
        if (!success.style.opacity) {
            success.style.opacity = 1;
        }
        
        
        if (success.style.opacity > 0) {
            success.style.opacity -= 0.1;
        } 
        
        else {
            clearInterval(intervalID);
        }
        
    }, 50);
    }, 5000);
    setTimeout(function(){
    success.style.display = "none";
    }, 6000);
}