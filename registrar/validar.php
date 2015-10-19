<?php
//patrones de validacion del form
$patronCedula = "/^[0-9]{6,12}+$/";
$patronNombre = "/[^\s][a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙù\s]+$/";
$patronCorreo = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/";
$patronFijo = "/^[0-9]{7}+$/";
$patronCelular = "/^[0-9]{10}+$/";

//obtencion de los datos del formulario por post, en variables
if (isset($_POST['cedula'])) {
  $cedula = $_POST['cedula'];
}
if (isset($_POST['nombre'])) {
  $nombre = $_POST['nombre'];
}
if (isset($_POST['correo'])) {
  $correo = $_POST['correo'];
}
if (isset($_POST['telefonofijo'])) {
  $telfij = $_POST['telefonofijo'];
}
if (isset($_POST['telefonocelular'])) {
  $telmov = $_POST['telefonocelular'];
}

//validacion de campos vacios
if (empty($cedula) && empty($nombre) && empty($correo) && empty($telfij) && empty($telmov)) {
    $senialC = "<span>*</span>";
    $senialN = "<span>*</span>";
    $senialE = "<span>*</span>";
    $senialF = "<span>*</span>";
    $senialP = "<span>*</span>";
    $mensajeT = "<span class='mensajes'>Por Favor Llene Todos los Campos<span>";
}
//validacion del campo cedula
else if (!preg_match($patronCedula, $cedula)) {
    if (empty($cedula)) {
        $mensajeC = "<span class='mensajes'>* Llene el campo Cedula<span>";
    } else {
        $mensajeC = "<span class='mensajes'>* La Cedula debe tener entre 6 y 12 números sin letras<span>";
    }
    $senialC = "<span>*</span>";

    //validacion del campo nombre
} else if ((!preg_match($patronNombre, $nombre))) {
    if (empty($nombre)) {
        $mensajeN = "<span class='mensajes'>* Llene el campo Nombre<span>";
    } else {
        $mensajeN = "<span class='mensajes'>* El nombre no puede incluir Números<span>";
    }
    $senialN = "<span>*</span>";

    //validacion del campo Correo
} else if (!preg_match($patronCorreo, $correo)) {
    if (empty($correo)) {
        $mensajeE = "<span class='mensajes'>* Llene el campo Correo<span>";
    } else {
        $mensajeE = "<span class='mensajes'>* Correo mal escrito ej:correo@example.com<span>";
    }
    $senialE = "<span>*</span>";

    //validacion del campo telfij
} else if (!preg_match($patronFijo, $telfij)) {
    if (empty($telfij)) {
        $mensajeF = "<span class='mensajes'>* Llene el campo Telefono Fijo<span>";
    } else {
        $mensajeF = "<span class='mensajes'>* El Telefono Fijo debe tener 7 Números y no puede tener letras<span>";
    }
    $senialF = "<span>*</span>";

    //validacion del campo telmov
} else if (!preg_match($patronCelular, $telmov)) {
    if (empty($telfij)) {
        $mensajeP = "<span class='mensajes'>* Llene el campo Número Celular<span>";
    } else {
        $mensajeP = "<span class='mensajes'>* El número Celular debe tener 10 Números y no puede tener letras<span>";
    }
    $senialP = "<span>*</span>";

    //increso al modulo de creacion del aprendiz
} else {
    //creacion del array con los datos del aprendiz
    $registro = array($cedula, $nombre, $correo, $telfij, $telmov);

    //creacion del documento txt
    $id = fopen("registro.txt", 'a') or die("Error al crear el Documento txt");

    //creacion del implode para los datos del aprendiz
    $almacenar = implode("-", $registro);
    $almacenar.="\n";

    //obtencion de un array con todos los registros
    $arrayRegistros = file("registro.txt");

    $cont2 = 0;

    //for para validar si el aprendiz se encuentra en el documento txt
    for ($i = 0; $i < count($arrayRegistros); $i++) {
        //almacenamieto en una variable auxiliar de los datos de la posisicion i en el documento txt
        $aux = $arrayRegistros[$i];

        //creacion de una lista que separa cada dato a una variable por medio del explode
        list($cadula_a, $nombre_a, $correo_a, $telfij_a, $telmov_a) = explode("-", $aux);

        //comparacion entre datos en el documento txt y la cedula de aprendiz a registrar
        if ($cadula_a == $cedula) {
            $cont2++;
        }
    }
    if ($cont2 > 0) {
        echo "<span class='mensajes'>Aprendiz ".$nombre." ya se encuentra registrado</span>";
    }
    if ($cont2 == 0) {
        fwrite($id, $almacenar);
        echo "<span class='mensajes'>Aprendiz ".$nombre." Registrado Exitosamente</span> ";
        //reseteo el value de los input para que quede limpio a un nuevo registro
        $cedula = "";
        $nombre = "";
        $correo = "";
        $telfij = "";
        $telmov = "";
    }
    fclose($id);
}
include 'registrar.php';
?>
