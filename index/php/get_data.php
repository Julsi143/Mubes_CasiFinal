<?php

include "../php/php_login/conexion.php";

extract($_POST);
$query = $conn->query("SELECT * FROM canciones where id = '$id'");
if($query->num_rows > 0){
    $resp['status'] = 'success';
    $res = $query->fetch_array();
    if(empty($res['portada']) || (!empty($res['portada']) && !is_file(explode("?",$res['portada'])[0])))
    $res['portada'] = "../imagenes/images/Mubes_logo.jpg";
    $resp['data'] = $res;
}else{
    $resp['status'] = 'failed';
    $resp['error'] = 'Unknown Audio ID';
}
echo json_encode($resp);

?>