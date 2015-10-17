<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro Aprendiz</title>
    <link rel="stylesheet" href="../css/estilo.css">
  </head>
  <body>
    <h1>Registro</h1>
        <form action="validar.php" method="post">
            <label for="cedula">Cedula</label>
            <input type="text" name="cedula" placeholder="Digite cedula" id="cedula">
                   <?php
                   if (isset($senialC)) {
                       echo $senialC;
                   }
                   ?>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Digite nombre" id="nombre">
                   <?php
                   if (isset($senialN)) {
                       echo $senialN;
                   }
                   ?>

            <label for="correo">Correo</label>
            <input type="email" name="correo" placeholder="Digite correo" id="correo">
                   <?php
                   if (isset($senialE)) {
                       echo $senialE;
                   }
                   ?>

            <label for="telfonofijo">TelFijo</label>
            <input type="text" name="telefonofijo" placeholder="Digite telefono fijo" id="telfonofijo">
                   <?php
                   if (isset($senialF)) {
                       echo $senialF;
                   }
                   ?>
            <label for="telefonocelular">Celular</label>
            <input type="text" name="telefonocelular" placeholder="Digite celular" id="telefonocelular">
                   <?php
                   if (isset($senialP)) {
                       echo $senialP;
                   }
                   ?><br><br>

            <input type="submit" name="registrar" value="registrar">
            <input type="reset" name="borrar" value="borrar">
        </form>
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
