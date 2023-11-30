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
    $consulta = "SELECT * from album WHERE id = '5'";

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

$sql = "SELECT * FROM canciones WHERE album_id = '5'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $itemId = $row["id"];
        $itemName = $row["titulo"];
        $itemArtista = $row["artista"];
        $isChecked = $row["like_activo"];
        ?>

        <form method="post" action="">
            <label>
            <i type="button" id="play_pause_reproducir"  class='bx bx-play' onclick="reproducir()"></i>

                <?php echo $itemName; ?>
                <?php echo $itemArtista; ?>
                <input type="checkbox" name="item_checkbox" <?php echo $isChecked ? "checked" : ""; ?> onchange="this.form.submit()">

            </label>
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
            <img src="" alt="" id="img_reproductor">
            <i id="cerrar_reproductor" class='bx bx-x' onclick="cerrar()" ></i>
            
            <span class="titulo_portada"></span>
            <span class="artista_portada"></span>
        </div>
        <span class="tiempo-actual">00:00 </span>
                <span class="tiempo-duracion">00:00</span>
        <section class="cont_reproductor">
            
            
                <input type="range" value="0" class="deslizador-audio">
                
                    <div class="controles">
                        <i type="button" id="previous_btn" class='bx bx-skip-previous' ></i>
                        <i type="button" id="play_pausa" class='bx bx-play' ></i>
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
    

    <script src="./prueba.js"></script>
    <script src="../album/reproductor_musica.js"></script>
    <script src="../biblioteca/playlist.js"></script>
    <script src="../cancion_portada/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</body>
</html>
