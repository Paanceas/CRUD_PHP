<?php

  if (isset($_POST['seleccion'])) {
    $selecion = $_POST['seleccion']+1;
  }
  $auxnum= $selecion-1;

  if (empty($selecion)) {
    $mensajeM = "<span class='mensajes'>Selecione un Aprendiz a Eliminar</span>";
  }else {

    $arrayRegistros = file("../registrar/registro.txt");

    if (file_exists("../registrar/registro.txt")) {
      $id = fopen("../registrar/registro.txt", 'w+');
    }
    for ($i = 0; $i < count($arrayRegistros); $i++) {
      $aux = $arrayRegistros[$i];
      $impresion = $arrayRegistros[$auxnum];
      if ($aux != $arrayRegistros[$auxnum]) {
        list($cadula_a, $nombre_a, $correo_a, $telfij_a, $telmov_a) = explode("-", $impresion);
        fwrite($id, $arrayRegistros[$i]);
        $mensajeM = "<span class='mensajes'> Se elimino el aprendiz ".$nombre_a." Con la cedula : ".$cadula_a."</span>";
      }
    }
    fclose($id);
  }
  include 'eliminar.php';

?>
