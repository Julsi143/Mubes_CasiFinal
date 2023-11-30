<?php 
include "../index/php/php_login/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="view-transition" content="same-origin" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="./js/ContenidoDinamico.js" ></script>

    <link rel="icon" href="../imagenes/images/Mubes_logo.png" />
    <title>Mubes</title>
    

</head>

<body>
    <script>
    </script>
        <div class="menu" id="menu">
            <div class="menu_logo">
                <button id="btn_menu_vuelta"><img src="../imagenes/images/Mubes_logo.png" alt=""></button>
                <div class="menu_logo_letras">
                    <div class="titulo_1" >
                        <h1>Mubes</h1>
                    </div>
                    <div class="titulo_2">
                        <h3>Music Vibes</h3>
                    </div>
                </div>
            </div>
            <div class="contenedor_items">
                <div class="item">
                    <button><img src="../imagenes/images/perfil_cap.png" alt=""></button>
                </div> 
            
                <div class="item">
                    <a href="../biblioteca/biblioteca.php" class="item">
                        <button><img src="../imagenes/images/biblioteca_cap.png" alt=""></button>
                    </a> 
                    
                </div>   
                <div class="item">
                    <div class="item">
                        <button><img src="../imagenes/images/Modo_artista_cap.png" alt=""></button>
                    </div>
                </div>   
                <div class="item">
                    <div class="item">
                        <button><img src="../imagenes/images/tema_cap.png" alt=""></button>
                    </div>
                </div>
                <div class="item">
                    <div class="item">
                        <button><img src="../imagenes/images/mubes_premiun_cap.png" alt=""></button>
                    </div>
                </div>        
                
            </div>
             <
            <footer class="footer">
                <a href="">Terminos y condiciones</a>
            </footer>
           
        </div>
        <div class="back_menu" id="back_menu">
        </div>                                   <!-- --------------fondo borroso del menu desplegable-->
        <div class="fondo_busqueda" id="fondo_busqueda">
            <section  class="resultados_busqueda">
               
                 
            </section>
            
        </div>        
  
    
        

    <div class="contenedor_inferior">
        <section class="difuminado" id="difuminado" onmouseover="" onmouseout="" >
        <nav class="contenedor_1">
            <div class="c1_contendedor_1">
                <button type="button" id="btn_menu"><img src="../imagenes/images/Mubes_logo.png" alt=""></button>
            </div>
            <div class="c2_contendedor_1">
                <form action="" method="get" class="search_bar"> 
                    <input id="buscador" type="text" placeholder="Busqueda..." name="q">
                    <button type="submit"> <img src="../imagenes/images/search.png" alt=""></button>
                </form>
                
            </div>
           <div class="c3_contendedor_1">
            <button type="button" id="btn_mubie"><img src="../imagenes/images/mubie_v1.png" alt=""></button>
           </div>
    
        </nav>
        </section>
      
        <div class="contenedor_2">
            <div class="sub1_contenedor_2">
                <h1>On Repeat</h1>
            </div>
    
        <div class="card-body">
        <?php 
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mubes";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

            $music = $conn->query('SELECT * FROM on_repeat');
            while($row = $music->fetch_assoc()):
                
                $cancionId = $row["id"];
                $cancionNombre = $row["titulo"];
                $cancionArtista = $row["artista"];
                $cancionPortada = $row["portada"];
                $cancionUrl = $row["url"];
            

                echo "<div class='template-onrepeat1' id='template-onrepeat1-$cancionId'>";
                echo "<div  class='c_contendedor_2' id='OnRepeat'>";
                echo "<img src=\"" . (is_file(explode("?", $row['portada'])[0]) ? $row['portada'] : "../imagenes/images/Mubes_logo.png") . "\" alt=\"\">";
                echo "<div class='text'>";
                echo "<p class=\"m-0 text-truncate\" title=\"" . $row['titulo'] . "\">" . $row['titulo'] . "</p>";
                echo "<p class=\"m-0 text-truncate\" title=\"" . $row['artista'] . "\">" . $row['artista'] . "</p>";                
                echo "</div>";

                echo "<div class='color'>";
                echo "<div type=\"button\" class=\"circulo_color play\" data-type=\"pause\" id=\"btn-hov\" onclick='cargarDatos($cancionId)'>";
                echo "<span class='material-symbols-outlined'>play_arrow</span>";
                echo "</div>"; 
                echo "</div>";
                
            ?> 
</div>

        </div>
        <?php endwhile; ?>

        </div>

            </div>
</div>
    
<section class="contenedor_albumes">
        <div class="albumes_recientes">
            <h1>Albumes Recientes</h1>
        </div>
        <div class="albumes">
         <div id="template-albumes-recientes" >  

         <section class="album-card" onclick="album1()">
         <?php
$consulta = "SELECT * from album where id = '1'";

$resultado = mysqli_query($conn, $consulta);

while ($mostrar = mysqli_fetch_array($resultado)) {
?>
            <div class="album">
                
                
            <img class="img_portada_album" src="<?php echo $mostrar['portada']?>" alt="">
                <section class="hov">
                       <div class="descripcion">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-280v-60h560v60H120Zm80-170v-60h560v60H200Zm80-170v-60h560v60H280Z"/></svg>
                        <h3> <?php echo $mostrar['cant_canciones']?> canciones</h3>
                        
                       
                       </div>
                </section>
                       <h2><?php echo $mostrar['titulo']?></h2>
                       <p><?php echo $mostrar['artista']?></p>
                 
                
            </div>
<?php } ?>
         </section>
         <section class="album-card" onclick="album2()">
         <?php
$consulta = "SELECT * from album where id = '2'";

$resultado = mysqli_query($conn, $consulta);

while ($mostrar = mysqli_fetch_array($resultado)) {
?>
            <div class="album">
                
                
            <img class="img_portada_album" src="<?php echo $mostrar['portada']?>" alt="">
                <section class="hov">
                       <div class="descripcion">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-280v-60h560v60H120Zm80-170v-60h560v60H200Zm80-170v-60h560v60H280Z"/></svg>
                        <h3> <?php echo $mostrar['cant_canciones']?> canciones</h3>
                        
                       
                       </div>
                </section>
                       <h2><?php echo $mostrar['titulo']?></h2>
                       <p><?php echo $mostrar['artista']?></p>
                 
                
            </div>
<?php } ?>
         </section>
         <section class="album-card"  onclick="album3()">
         <?php
$consulta = "SELECT * from album where id = '3'";

$resultado = mysqli_query($conn, $consulta);

while ($mostrar = mysqli_fetch_array($resultado)) {
?>
            <div class="album">
                
                
            <img class="img_portada_album" src="<?php echo $mostrar['portada']?>" alt="">
                <section class="hov">
                       <div class="descripcion">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-280v-60h560v60H120Zm80-170v-60h560v60H200Zm80-170v-60h560v60H280Z"/></svg>
                        <h3> <?php echo $mostrar['cant_canciones']?> canciones</h3>
                        
                       
                       </div>
                </section>
                       <h2><?php echo $mostrar['titulo']?></h2>
                       <p><?php echo $mostrar['artista']?></p>
                 
                
            </div>
<?php } ?>
         </section>
<section class="album-card" onclick="album4()">
         <?php
$consulta = "SELECT * from album where id = '4'";

$resultado = mysqli_query($conn, $consulta);

while ($mostrar = mysqli_fetch_array($resultado)) {
?>
            <div class="album">
                
                
            <img class="img_portada_album" src="<?php echo $mostrar['portada']?>" alt="">
                <section class="hov">
                       <div class="descripcion">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-280v-60h560v60H120Zm80-170v-60h560v60H200Zm80-170v-60h560v60H280Z"/></svg>
                        <h3> <?php echo $mostrar['cant_canciones']?> canciones</h3>
                        
                       
                       </div>
                </section>
                       <h2><?php echo $mostrar['titulo']?></h2>
                       <p><?php echo $mostrar['artista']?></p>
                 
                
            </div>
<?php } ?>

<section class="album-card" onclick="album5()">
         <?php
$consulta = "SELECT * from album where id = '5'";

$resultado = mysqli_query($conn, $consulta);

while ($mostrar = mysqli_fetch_array($resultado)) {
?>
            <div class="album">
                
                
            <img class="img_portada_album" src="<?php echo $mostrar['portada']?>" alt="">
                <section class="hov">
                       <div class="descripcion">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M120-280v-60h560v60H120Zm80-170v-60h560v60H200Zm80-170v-60h560v60H280Z"/></svg>
                        <h3> <?php echo $mostrar['cant_canciones']?> canciones</h3>
                        
                       
                       </div>
                </section>
                       <h2><?php echo $mostrar['titulo']?></h2>
                       <p><?php echo $mostrar['artista']?></p>
                 
                
            </div>
<?php } ?>
         </section>
            </div> 
        
        </div>
        
    </section>
    

    
    <div class="linea"></div> 
    <div class="linea" id="linea-2"></div> 
    
    <footer class="Pie-de-pag">
        <ul class="lista">
            <p>Empresa</p>
            <a href=""class="objetos-lista">Acerca de</a>
            <a href=""class="objetos-lista">Unete a nosotros</a>
            <a href=""class="objetos-lista">Persmiso de uso</a>
        </ul>
        <ul class="lista" id="lista-2">
            <p>Desarrollo</p>
            <a href=""class="objetos-lista">Canciones</a>
            <a href=""class="objetos-lista">Parte ilustre</a>
            <a href=""class="objetos-lista">Equipo de desarrollo</a>
            <a href=""class="objetos-lista">Equipo de mantenimiento</a>
            <a href=""class="objetos-lista">Equipo de finanzas</a>
        </ul>
        <div class="icono-ig">
            <a href="https://www.instagram.com/tomyll_/" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://www.instagram.com/julsm04/" target="_blank">
                <i class="bi bi-instagram"></i>
            </a>
        </div>
        <div class="linea" id="linea-3"></div> 
        <div class="derechos-de-autor">
            <p>© 2023 Mubes AB</p>
        </div>
        
    </footer>


    <div class="reproductor" id="reproductor" >
        <div class="portada">
        <img id="portada" src="" alt="">
            <i id="cerrar_reproductor" class='bx bxs-chevron-up' onclick="cerrar()" ></i>
            <span><p id="titulo" class="titulo_portada"></p></span>
            <span><p id="artista" class="artista_portada"></p></span>
        </div>
        <span class="tiempo-actual">00:00</span>
        <span class="tiempo-duracion">00:00</span>
        <section class="cont_reproductor">
            
            
                <input type="range" value="0" class="deslizador-audio">
                
                    <div class="controles">
                    <i type="button" id="next_btn" data-value="next" onclick="cambiarCancion('next')" class='bx bx-skip-next-circle'></i>
                        <i type="button" id="play_pause" id="btn-hov" data-type="pause" data-value="play" class='bx bx-pause-circle'></i>
                        <i type="button" id="previous_btn" data-value="previous" onclick="cambiarCancion('previous')" class='bx bx-skip-previous-circle'></i>
                    </div>
                    
            <audio id="musica"></audio>
        </section>
        <div class="iconos">
            <i class='bx bxs-user-detail' ></i>
            <i id="like" class='bx bx-heart' type="checkbox"></i>
            <i  class='bx bx-detail'></i>
        </div>
        
        
    </div>
            
    <script>
var audio = document.getElementById("musica");

function cargarDatos(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var datos = JSON.parse(xhr.responseText);
                mostrarDatos(datos);
            } else {
                console.error('Error en la solicitud: ' + xhr.status);
            }
        }
    };

    // Ruta del script PHP que obtiene los datos de la base de datos para un ID específico
    xhr.open("GET", "actualizar.php?id=" + id, true);
    xhr.send();

    console.log(id);
}

function mostrarDatos(datos) {
    // Establecer la URL del audio y reproducir
    audio.src = datos.url;
    audio.play();

    // Actualizar el contenido de las etiquetas HTML existentes
    document.getElementById("titulo").innerHTML = datos.titulo;
    document.getElementById("artista").innerHTML = datos.artista;
    document.getElementById("portada").src = datos.portada;
}

const play_pause =document.getElementById("play_pause");

play_pause.addEventListener('click', e=>{
    if (play_pause.classList=="bx bx-pause-circle"){
            play_pause.classList.remove('bx-pause-circle')
            play_pause.classList.add('bx-play-circle')
            audio.pause();
        }
    else{
        play_pause.classList.remove('bx-play-circle')
        play_pause.classList.add('bx-pause-circle')
        audio.play()
    }
});

const deslizador_audio = document.querySelector(".deslizador-audio");
const tiempoActual = document.querySelector(".tiempo-actual");
const tiempoDuracion = document.querySelector(".tiempo-duracion");
const musica = document.querySelector("#musica");

deslizador_audio.value = 0;
tiempoActual.innerHTML = '00:00';

musica.addEventListener('loadedmetadata', () => {
    deslizador_audio.max = musica.duration;
    tiempoDuracion.innerHTML = formatTime(musica.duration);
});

const formatTime = (time) => {
    let min = Math.floor(time / 60);
    if (min < 10) {
        min = `0${min}`;
    }
    let sec = Math.floor(time % 60);
    if (sec < 10) {
        sec = `0${sec}`;
    }
    return `${min}:${sec}`;
};

setInterval(() => {
    deslizador_audio.value = musica.currentTime;
    tiempoActual.innerHTML = formatTime(musica.currentTime);
}, 500);

deslizador_audio.addEventListener("change", () => {
    musica.currentTime = deslizador_audio.value;
});

var currentSongIndex = 0;
var songs = [
    <?php
    $music = $conn->query('SELECT * FROM on_repeat');
    while ($row = $music->fetch_assoc()):
    ?>
        {
            titulo: "<?php echo $row['titulo']; ?>",
            artista: "<?php echo $row['artista']; ?>",
            url: "<?php echo $row['url']; ?>",
            portada: "<?php echo $row['portada']; ?>",
        },
    <?php endwhile; ?>
];

function cambiarCancion(action) {
    if (action === 'next') {
        currentSongIndex = (currentSongIndex + 1) % songs.length;
    } else if (action === 'previous') {
        currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
    }

    var newSong = songs[currentSongIndex];
    mostrarDatos(newSong);
    audio.play();
}

audio.addEventListener('ended', function() {
    // Cuando la canción actual ha terminado, pasar a la siguiente automáticamente
    cambiarCancion('next');
});


</script>


<script src="js/objetos.js"></script>
<script src="js/mubie2.js" ></script>
<script src="js/Fondo.js" ></script>
<script src="js/script.js" ></script>

<script src="js/navegador.js" ></script>
</body>
<?php if(isset($conn) && $conn) @$conn->close(); ?>
</html>