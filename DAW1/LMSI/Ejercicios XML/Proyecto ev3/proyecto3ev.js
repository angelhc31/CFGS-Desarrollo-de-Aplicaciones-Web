function mostrarCategoria(platform){
    var juegos=document.getElementsByTagName('table');
    for(var i=1; i<juegos.length; i++){
        var plataforma=juegos[i].getElementsByClassName('platform')[0].textContent;

        if(plataforma==platform){
            juegos[i].style.display="block";
        }
        else{
            juegos[i].style.display="none";
        }
    }
}

function mostrarTodo(){

    var juegos=document.getElementsByTagName('table');

    for(var i=1; i<juegos.length; i++){
        juegos[i].style.display="block";
    }
}