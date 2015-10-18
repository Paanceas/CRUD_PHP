<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro Aprendiz</title>
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body>
    <h1>Registro</h1>
    <div class="links">
      <img src="../img/sena.png"/>
      <a href="../modificar/modificar.php">Modificar Aprendiz</a>
      <a href="../eliminar/eliminar.php">Eliminar Aprendiz</a>
      <a href="../index.php">Consultar Aprendiz</a>
      <a href="https://github.com/Paanceas/CRUD_PHP" target="_blank"><img src="../img/github.png" alt="" /></a>
    </div>
        <div class="contenido">
          <form action="validar.php" method="post">
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
             ?>">

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

             <input type="submit" name="registrar" value="registrar">
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
