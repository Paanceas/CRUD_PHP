<?php
if (isset($_POST['accion'])) {
    $opcion = $_POST['accion'];
}
if (isset($_POST['seleccion'])) {
    $seleccion = $_POST['seleccion'];
}
switch ($opcion) {
    case '1':
        $regMod = file("../registrar/registro.txt");
        list($ced, $nom, $cor, $tf, $tc) = explode("-", $regMod[$seleccion]);
        include './formaux.php';
        break;
    case '2':
      //patrones de validacion del form
      $patronCedula = "/^[0-9]{6,12}+$/";
      $patronNombre = "/^[a-zA-Z]+$/";
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
          include 'formaux.php';

      }
      //validacion del campo cedula
      elseif (!preg_match($patronCedula, $cedula)) {
          if (empty($cedula)) {
              $mensajeC = "<span class='mensajes'>* Llene el campo Cedula<span>";
          } else {
              $mensajeC = "<span class='mensajes'>* La Cedula debe tener entre 6 y 12 números y no llevar letras<span>";
          }
          $senialC = "<span>*</span>";
          include 'formaux.php';

          //validacion del campo nombre
      } elseif ((!preg_match($patronNombre, $nombre))) {
          if (empty($nombre)) {
              $mensajeN = "<span class='mensajes'>* Llene el campo Nombre<span>";
          } else {
              $mensajeN = "<span class='mensajes'>* El nombre no puede incluir Números<span>";
          }
          $senialN = "<span>*</span>";
          include 'formaux.php';

          //validacion del campo Correo
      } elseif (!preg_match($patronCorreo, $correo)) {
          if (empty($correo)) {
              $mensajeE = "<span class='mensajes'>* Llene el campo Correo<span>";
          } else {
              $mensajeE = "<span class='mensajes'>* Correo mal escrito ej:correo@example.com<span>";
          }
          $senialE = "<span>*</span>";
          include 'formaux.php';

          //validacion del campo telfij
      } elseif (!preg_match($patronFijo, $telfij)) {
          if (empty($telfij)) {
              $mensajeF = "<span class='mensajes'>* Llene el campo Telefono Fijo<span>";
          } else {
              $mensajeF = "<span class='mensajes'>* El Telefono Fijo debe tener 7 Números y no puede tener letras<span>";
          }
          $senialF = "<span>*</span>";
          include 'formaux.php';

          //validacion del campo telmov
      } elseif (!preg_match($patronCelular, $telmov)) {
          if (empty($telfij)) {
              $mensajeP = "<span class='mensajes'>* Llene el campo Número Celular<span>";
          } else {
              $mensajeP = "<span class='mensajes'>* El número Celular debe tener 10 Números y no puede tener letras<span>";
          }
          $senialP = "<span>*</span>";
          include 'formaux.php';

          //increso al modulo de creacion del aprendiz
      }
  }
