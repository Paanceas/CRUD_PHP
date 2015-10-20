<?php
if (isset($_POST['accion'])) {
    $opcion = $_POST['accion'];
}
if (isset($_POST['seleccion'])) {
    $seleccion = $_POST['seleccion'];
}
$cont = 0;
switch ($opcion) {
    case '1':
        $regMod = file("../registrar/registro.txt");
        list($cedula, $nombre, $correo, $telfij, $telmov) = explode("-", $regMod[$seleccion]);
        include './formaux.php';
        break;
    case '2':
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
        //validacion del campo cedula
        }elseif (!preg_match($patronCedula, $cedula)) {
            if (empty($cedula)) {
                $mensajeC = "<span class='mensajes'>* Llene el campo Cedula<span>";
            } else {
                $mensajeC = "<span class='mensajes'>* La Cedula debe tener entre 6 y 12 números y no llevar letras<span>";
            }
            $senialC = "<span>*</span>";

            //validacion del campo nombre
        } elseif ((!preg_match($patronNombre, $nombre))) {
            if (empty($nombre)) {
                $mensajeN = "<span class='mensajes'>* Llene el campo Nombre<span>";
            } else {
                $mensajeN = "<span class='mensajes'>* El nombre no puede incluir Números<span>";
            }
            $senialN = "<span>*</span>";

            //validacion del campo Correo
        } elseif (!preg_match($patronCorreo, $correo)) {
            if (empty($correo)) {
                $mensajeE = "<span class='mensajes'>* Llene el campo Correo<span>";
            } else {
                $mensajeE = "<span class='mensajes'>* Correo mal escrito ej:correo@example.com<span>";
            }
            $senialE = "<span>*</span>";

            //validacion del campo telfij
        } elseif (!preg_match($patronFijo, $telfij)) {
            if (empty($telfij)) {
                $mensajeF = "<span class='mensajes'>* Llene el campo Telefono Fijo<span>";
            } else {
                $mensajeF = "<span class='mensajes'>* El Telefono Fijo debe tener 7 Números y no puede tener letras<span>";
            }
            $senialF = "<span>*</span>";

            //validacion del campo telmov
        } elseif (!preg_match($patronCelular, $telmov)) {
            if (empty($telfij)) {
                $mensajeP = "<span class='mensajes'>* Llene el campo Número Celular<span>";
            } else {
                $mensajeP = "<span class='mensajes'>* El número Celular debe tener 10 Números y no puede tener letras<span>";
            }
            $senialP = "<span>*</span>";

            //increso al modulo de creacion del aprendiz
        } else {
           $pos = $_POST['posicion'];
           $nuevoReg = $cedula . "-" . $nombre . "-" . $correo . "-" . $telfij . "-" . $telmov . "\n";

           ////Convertimos el archivo en un array
           $archiAprendices = file("../registrar/registro.txt");

          ////Insertamos en el array el nuevo registro
          $archiAprendices[$pos] = $nuevoReg;

          /////Abrimos el archivo para insertar el array con los cambios
          if (file_exists("../registrar/registro.txt")) {
              $id = fopen("../registrar/registro.txt", "w+");
          }
          /////Contamos cantidad de datos para controlar el siguiente for
          /////Recorriendo el array modificado insertamos uno a uno cada valor en el archivo plano
          for ($index = 0; $index < count($archiAprendices); $index++) {
              fwrite($id, $archiAprendices[$index]);
          }
          //////////Cerramos el archivo
          fclose($id);
          $mensajeM ="<span class='mensajes'>El Aprendiz Correspondiente <br> a La cedula ".$cedula." Fue <br>Modificado</span>";
          $cont = 1;
          break;
          }
  }
  if ($cont == 0) {
    include './formaux.php';
  }else {
    include './modificar.php';
  }
