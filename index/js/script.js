document.getElementById("btn_menu").addEventListener("click", mostrar_menu);
document.getElementById("btn_menu_vuelta").addEventListener("click",sacar_menu);
menu = document.getElementById("menu");
back_menu = document.getElementById("back_menu");
reproductor = document.getElementById("btn-hov");



function mostrar_menu(){
    menu.style.left = "0px";
    back_menu.style.display = "block";
};
function sacar_menu(){
    menu.style.left = "-450px";
    back_menu.style.display = "none";
    
}

//-----------------------------------------------------mostrar reproducto
reproductor.addEventListener('click', r=> {
    document.getElementById("reproductor").style.opacity="1";
})

function cerrar(){
    document.getElementById("reproductor").style.opacity="0";
    
}

//------------------------------------------------------------------redireccion albumes ijij

function album1(){
    location.href = "../album/album.php";
}

function album2(){
    location.href = "../album/album2.php";
}

function album3(){
    location.href = "../album/album3.php";
}

function album4(){
    location.href = "../album/album4.php";
}

function album5(){
    location.href = "../album/album5.php";
}


