<?php
include 'consultar.php';
$listaAp = file("../registrar/registro.txt");

if (isset($_POST['consulta'])) {
  $palabraConsulta = $_POST['consulta'];
}
if (isset($_POST['busqueda'])) {
  $buscarPor = $_POST['busqueda'];
}

if (empty($palabraConsulta) && empty($buscarPor)) {
    $senialB = "<span>*</span>";
    $senialP = "<span>*</span>";
    $mensajeT = "<span class='mensajes'>Por Favor Llene Todos los Campos<span>";
}else if (empty($palabraConsulta)) {
    $senialP= "<span>*</span>";
    $mensajeP = "<span class='mensajes'>Por Favor Llene el campo de Busqueda<span>";
  }else if (empty($palabraConsulta)) {
      $senialB = "<span>*</span>";
      $mensajeB = "<span class='mensajes'>Por Favor seleccione una opción<span>";
  }else {
    $cont = 0;
    echo "<div class='contenido padding'";
    echo "Resultado de la busqueda: <br>";
    for ($i=0; $i < count($listaAp); $i++) {
      $aux = $listaAp[$i];
      list($cedula_a, $nombre_a, $correo_a, $telfij_a, $telmov_a) = explode("-", $aux);
      if ($buscarPor == "cedula") {
        if ($cedula_a == $palabraConsulta) {
          echo "<br>Cedula: ".$cedula_a."<br>";
          echo "Nombre: ".$nombre_a."<br>";
          echo "Correo: ".$correo_a."<br>";
          echo "Telefono Fijo: ".$telfij_a."<br>";
          echo "Celular: ".$telmov_a."<br>";
          echo "_________________________"."<br>";
          $cont++;
        }
      }elseif ($buscarPor == "nombre") {
        if ($nombre_a == $palabraConsulta) {
          echo "<br>Cedula: ".$cedula_a."<br>";
          echo "Nombre: ".$nombre_a."<br>";
          echo "Correo: ".$correo_a."<br>";
          echo "Telefono Fijo: ".$telfij_a."<br>";
          echo "Celular: ".$telmov_a."<br>";
          echo "_________________________"."<br>";
          $cont++;
        }
      }elseif ($buscarPor == "telefono") {
        if ($telfij_a == $palabraConsulta) {
          echo "<br>Cedula: ".$cedula_a."<br>";
          echo "Nombre: ".$nombre_a."<br>";
          echo "Correo: ".$correo_a."<br>";
          echo "Telefono Fijo: ".$telfij_a."<br>";
          echo "Celular: ".$telmov_a."<br>";
          echo "_________________________"."<br>";
          $cont++;
        }
      }elseif ($buscarPor == "celular") {
        if ($telmov_a == $palabraConsulta) {
          echo "<br>Cedula: ".$cedula_a."<br>";
          echo "Nombre: ".$nombre_a."<br>";
          echo "Correo: ".$correo_a."<br>";
          echo "Telefono Fijo: ".$telfij_a."<br>";
          echo "Celular: ".$telmov_a."<br>";
          echo "_________________________"."<br>";
          $cont++;
        }
      }
    }
    if ($cont == 0) {
      echo "<br>No se encontraron registros por ".$buscarPor." = ".$palabraConsulta;
    }else {
      echo "<br>Total de registros encontrados por ".$buscarPor." y la busqueda ".$palabraConsulta." es de: ".$cont;
    }

    echo "</div>";
}
