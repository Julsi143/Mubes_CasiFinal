

// const album = JSON.parse(localStorage.getItem("albun_reciente_para_reproducir"))

// const espacioo = document.querySelector("#cont_canciones")
// const template= document.querySelector("template").content
// const fragmento=document.createDocumentFragment()
// const contador_clicks = document.querySelector("#cont_canciones")
// const favoritos = document.querySelector(".favoritos")



// const deslizador_barra =document.querySelector(".deslizador-audio")
// let musicaActual=0;
// const musica = document.querySelector("#musica")
// const tiempo_Actual = document.querySelector(".tiempo-actual")
// const tiempoDuracion =document.querySelector(".tiempo-duracion")
// const play = document.getElementById("play_pause_reproducir");
// const playBtn = document.querySelector("#play_pausa")
// const titulo_album = document.querySelector("#album_titulo")
// const datos_album = document.querySelector("#album_data")
// const igm_portada = document.querySelector(".portada_album")

// // crea elementos con props dinamicas directamente desde JS

// album.forEach(el =>{
//     el.canciones.forEach(can =>{
//         template.querySelector('a').textContent = can.nombre
//     template.querySelector('h3').textContent=can.artista
//     template.querySelector('i').dataset.id = can.id
//     template.querySelector('#estrella_favs').dataset.id = can.id;
//     const clone=template.cloneNode(true)
//     fragmento.appendChild(clone)
//     })
// });
// espacioo.appendChild(fragmento)




// playBtn.addEventListener("click", e=>{
//     if (playBtn.classList == "bx bx-play") {
//         playBtn.classList.remove('bx-play')
//         playBtn.classList.add('bx-pause')
//     }
//     else{
//         playBtn.classList.remove('bx-pause')
//         playBtn.classList.add('bx-play')
//     }
// })

// // captura las cordenadas de los clicks
// contador_clicks.addEventListener("click",cor =>{
//   repro(cor)  
// })

// const repro = cordenadas =>{
//     if(cordenadas.target.classList.contains("bx-play")){
//         reproduccion_final(cordenadas.target.dataset.id)
        
//     }
//     cordenadas.stopPropagation();
// }


// album.forEach(data=>{
//     titulo_album.innerHTML=data.nombreAlbum
//     datos_album.innerHTML=data.artistaAlbum
//     igm_portada.src=data.igm_portada
//     document.querySelector("#img_reproductor").src=data.igm_portada

// })


// const reproduccion_final = ide =>{
//     let albun_resultado =[]
//     album.forEach(cancion =>{
//         const obj =cancion.canciones.find((elemento,index,array)=>{
//             return elemento.id == ide;
//         })
        
//         albun_resultado.push(obj)
//     })
//     albun_resultado.forEach(obj =>{
//     document.querySelector("audio").src=obj.url
//     document.querySelector(".titulo_portada").innerHTML=obj.nombre
//     document.querySelector(".artista_portada").innerHTML=obj.artista
    

//     deslizador_barra.value=0;
    
//     tiempo_Actual.innerHTML='00:00'

//     setTimeout(() => {
//         deslizador_barra.max = musica.duration;
//         tiempoDuracion.innerHTML = formatTime(musica.duration);
//     }, 300);
    
//     const formatTime = (time) => {
//         let min = Math.floor(time / 60);
//         if (min < 10){
//             min = `0${min}`
//         }
//         let sec = Math.floor(time % 60);
//         if(sec < 10){
//             sec = `0${sec}`
//         }
//         return `${min}:${sec}` 
//     }
    
//     playBtn.addEventListener("click",el =>{
//         if (playBtn.className.includes("pause")){
//             musica.play();
//         }
//         else{
//             musica.pause();
//         }
//     })

//     setInterval(() => {
//         deslizador_barra.value = musica.currentTime
//         tiempo_Actual.innerHTML = formatTime(musica.currentTime)
//     }, 500);

//     deslizador_barra.addEventListener("change",()=>{
//         musica.currentTime = deslizador_barra.value;
//     })
//     })
// }



// //_------------------playlists-----------------------------------------------------------------




// contador_clicks.addEventListener("click", e => {
//     agregar(e.target)

//     const agregadas = [];
//     agregadas.push(e.target.parentNode.dataset.id);
//     console.log(agregadas); 

// });




// const agregar = e =>{
//     if(e.classList.contains("col-lg-1")){
//         agregar_fav(e.target.parentNode.obj);   
//     }
// }

// const agregar_fav = cancion =>{
//     const obj =cancion.canciones.find((elemento,index,array)=>{
//         return elemento.id;
//     }
//     )
// }




// localStorage.setItem("canciones-en-playlists",JSON.stringify(contador_clicks))


    


