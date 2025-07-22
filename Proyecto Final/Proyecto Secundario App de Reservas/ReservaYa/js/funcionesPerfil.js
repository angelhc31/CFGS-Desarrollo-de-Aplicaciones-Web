(function () {

    /**
     * Main stopscrollwheelzoom constructor
     */
    let SSWZ = function () {

        /**
         * Handler for scroll- control must be pressed.
         * @param e
         */
        this.keyScrollHandler = function (e) {
            if (e.ctrlKey) {
                e.preventDefault();
                return false;
            }
        }
    };

    if (window === top) {
        let sswz = new SSWZ();
        window.addEventListener('wheel', sswz.keyScrollHandler, { passive: false });
    }

})();

var card= document.getElementById("update-card");

function ocultarCard() {
    var intervalID = setInterval(function () {
        if (card.style.opacity > 0) {
            card.style.opacity -= 0.1;
        } 
        
        else {
            clearInterval(intervalID);
        }
    }, 5);
    
    setTimeout(function(){
        card.style.display = "none";
    }, 150);
}
function mostrarCard(option) {

    document.getElementById("modiFoto").style.display = "none";
    document.getElementById("modiNombre").style.display = "none";
    document.getElementById("modiUser").style.display = "none";
    document.getElementById("modiPwd").style.display = "none";
    document.getElementById("modiMail").style.display = "none";
    document.getElementById("modiTelf").style.display = "none";
    document.getElementById("modiDirecc").style.display = "none";
    
    switch (option) {
        case 1: document.getElementById("modiFoto").style.display = "block";
        break;

        case 2: document.getElementById("modiNombre").style.display = "block";
        break;

        case 3: document.getElementById("modiUser").style.display = "block";
        break;

        case 4: document.getElementById("modiPwd").style.display = "block";
        break;

        case 5: document.getElementById("modiMail").style.display = "block";
        break;

        case 6: document.getElementById("modiTelf").style.display = "block";
        break;

        case 7: document.getElementById("modiDirecc").style.display = "block";
        break;
    }

    setTimeout(function(){
        card.style.opacity = 1;
        card.style.display = "block";
    }, 0);
}

window.addEventListener('click', function(e) {
    if (!card.contains(e.target) && card.style.display == "block") {
        card.style.display = "none";
    }
})