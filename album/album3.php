<?php
    include "../index/php/php_login/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mubes</title>
    <link rel="stylesheet" href="styles_album.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../imagenes/images/Mubes_logo.png" />
    

</head>




<body class="body_album">
    <div>

    <div class="row">

    <?php
    $consulta = "SELECT * from album WHERE id = '3'";

    $resultado = mysqli_query($conn, $consulta);
    
    while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>

        <div id="cont_album" class="col-lg-6">
            <img class="portada_album" src="<?php echo $mostrar['portada']?>" height="410px" width="410px" >

            <div class="row">
                
                    <div class="col-lg-10">
                        <div id="tituloyartista" class="container">  
                            <h2 id="album_titulo" class="titulo_album">
                                <?php echo $mostrar['titulo']?> 
                            </h2>
                            <h3 id="album_data" class="datos_album">
                                <?php echo $mostrar['artista']?> 
                            </h3>
                        </div>
                    </div> 
            </div>
    <?php 
}
?>
    </div>


    <div class="col-lg-6">

        <div id="cont_canciones">

        <div>
        <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mubes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isChecked = isset($_POST["item_checkbox"]) ? 1 : 0;
    $itemId = $_POST["item_id"];
    $sql = "UPDATE canciones SET like_activo = $isChecked WHERE id = $itemId";
    $conn->query($sql);
}

$sql = "SELECT * FROM canciones WHERE album_id = '3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $itemId = $row["id"];
        $cancionNombre = $row["titulo"];
        $cancionArtista = $row["artista"];
        $isChecked = $row["like_activo"];
        $cancionPortada = $row["portada"];
        $cancionUrl = $row["url"];

        
        ?>

        <form method="post" action="">
        <div id="canciones" class="row">

<div id="nro_cancion" class="col-lg-1">
   <?php echo "<i type='button' id='play_pause_reproducir'  class='bx bx-play' onclick='cargarDatos($itemId)'></i>";?>
</div>

<div class="col-lg-8">
    <a class="titulo_canciones"><?php echo $cancionNombre; ?></a>
    <h3 class="nombre_artista"><?php echo $cancionArtista; ?></h3>
</div>


<div class="col-lg-1">
    <label id="estrella_favs" class="container">
        <input type="checkbox" name="item_checkbox" <?php echo $isChecked ? "checked" : ""; ?> onchange="this.form.submit()">
        <svg height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M9.362,9.158c0,0-3.16,0.35-5.268,0.584c-0.19,0.023-0.358,0.15-0.421,0.343s0,0.394,0.14,0.521    c1.566,1.429,3.919,3.569,3.919,3.569c-0.002,0-0.646,3.113-1.074,5.19c-0.036,0.188,0.032,0.387,0.196,0.506    c0.163,0.119,0.373,0.121,0.538,0.028c1.844-1.048,4.606-2.624,4.606-2.624s2.763,1.576,4.604,2.625    c0.168,0.092,0.378,0.09,0.541-0.029c0.164-0.119,0.232-0.318,0.195-0.505c-0.428-2.078-1.071-5.191-1.071-5.191    s2.353-2.14,3.919-3.566c0.14-0.131,0.202-0.332,0.14-0.524s-0.23-0.319-0.42-0.341c-2.108-0.236-5.269-0.586-5.269-0.586    s-1.31-2.898-2.183-4.83c-0.082-0.173-0.254-0.294-0.456-0.294s-0.375,0.122-0.453,0.294C10.671,6.26,9.362,9.158,9.362,9.158z"></path></g></g></svg>
      </label>
</div>

<div class="col-lg-2">
    <span class="material-symbols-outlined">
        more_horiz
        </span>
</div>

</div>  
            <input type="hidden" name="item_id" value="<?php echo $itemId; ?>">
        </form>

        <?php
    }
} else {
    echo "0 results";
}

$conn->close();
?>

            </div>





    




    

    </div>
    </div>
    <footer class="reproductor" id="reproductor">
        <div class="portada">
            <img  id="img_reproductor" src="" alt="">
            <i id="cerrar_reproductor" class='bx bx-x' onclick="cerrar()" ></i>
            
            <span class="titulo_portada" id="titulo"></span>
            <span class="artista_portada" id="artista"></span>
        </div>
        <span class="tiempo-actual">00:00 </span>
                <span class="tiempo-duracion">00:00</span>
        <section class="cont_reproductor">
            
            
                <input type="range" value="0" class="deslizador-audio">
                
                    <div class="controles">
                        <i type="button" id="previous_btn" class='bx bx-skip-previous' ></i>
                        <i type="button" id="play_pausa" class='bx bx-pause' ></i>
                        <i type="button" id="next_btn" class='bx bx-skip-next'></i>
                    </div>
                    
                    <audio src="" id="musica"  ></audio>

        </section>
        <div class="iconos">
            <i class='bx bxs-user-detail' ></i>
            <i id="like" class='bx bxs-heart' ></i>
            <i type="button" id="lyrics" class='bx bx-detail'></i>
        </div>

    </footer>
    

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
    document.getElementById("img_reproductor").src = datos.portada;
}

const play_pause =document.getElementById("play_pausa");

play_pause.addEventListener('click', e=>{
    if (play_pause.classList=="bx bx-pause"){
            play_pause.classList.remove('bx-pause')
            play_pause.classList.add('bx-play')
            audio.pause();
        }
    else{
        play_pause.classList.remove('bx-play')
        play_pause.classList.add('bx-pause')
        audio.play()
    }
})


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


</script>


    <script src="./prueba.js"></script>
    <script src="../album/reproductor_musica.js"></script>
    <script src="../biblioteca/playlist.js"></script>
    <script src="../cancion_portada/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</body>
</html>
