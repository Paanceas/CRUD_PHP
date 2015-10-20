<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro Aprendiz</title>
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body>
    <h1>Actualización de Aprendiz</h1>
    <div class="links">
        <img src="../img/sena.png"/>
        <a href="../registrar/registrar.php">Registrar Aprendiz</a>
        <a href="../consultar/consultar.php">Consultar Aprendiz</a>
        <a href="../eliminar/eliminar.php">Eliminar Aprendiz</a>
    </div>
        <div class="contenido">
          <form action="actualizacion.php" method="post">
            <input type="hidden" name="accion" value="2">
            <input type="hidden" name="posicion" value="<?php  echo $seleccion; ?>"/>
            <?php
            if (isset($senialC)) {
                echo $senialC;
            }
            ?>
            <label for="cedula">Cedula</label>
            <input type="text" name="cedula" placeholder="Digite cedula" id="cedula" value="<?php
             if (isset($cedula)) {
                 echo $cedula;
             }
             ?>" readonly="readonly">

             <?php
             if (isset($senialN)) {
                 echo $senialN;
             }
             ?>
             <label for="nombre">Nombre</label>
             <input type="text" name="nombre" placeholder="Digite nombre" id="nombre" value="<?php
             if (isset($nombre)) {
                 echo $nombre;
             }
             ?>">

             <?php
             if (isset($senialE)) {
                 echo $senialE;
             }
             ?>
             <label for="correo">Correo</label>
             <input type="email" name="correo" placeholder="Digite correo" id="correo" value="<?php
             if (isset($correo)) {
                 echo $correo;
             }
             ?>">

             <?php
             if (isset($senialF)) {
                 echo $senialF;
             }
             ?>
             <label for="telfonofijo">TelFijo</label>
             <input type="text" name="telefonofijo" placeholder="Digite telefono fijo" id="telfonofijo" value="<?php
             if (isset($telfij)) {
                 echo $telfij;
             }
             ?>">

             <?php
             if (isset($senialP)) {
                 echo $senialP;
             }
             ?>
             <label for="telefonocelular">Celular</label>
             <input type="text" name="telefonocelular" placeholder="Digite celular" id="telefonocelular" value="<?php
             if (isset($telmov)) {
                 echo $telmov;
             }
             ?>">

             <input type="submit" name="editar" value="Editar">
         </form>
        </div>
       <?php
       if (isset($mensajeT)) {
           echo $mensajeT;
       } else {
           if (isset($mensajeC)) {
               echo $mensajeC;
           }
           if (isset($mensajeN)) {
               echo $mensajeN;
           }
           if (isset($mensajeE)) {
               echo $mensajeE;
           }
           if (isset($mensajeF)) {
               echo $mensajeF;
           }
           if (isset($mensajeP)) {
               echo $mensajeP;
           }
       }
       ?>
  </body>
</html>
