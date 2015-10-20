<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eliminar Aprendiz</title>
        <link rel="stylesheet" href="../css/estilo.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <h1>Eliminar Aprendiz</h1>
        <div class="links">
            <img src="../img/sena.png"/>
            <a href="../registrar/registrar.php">Registrar Aprendiz</a>
            <a href="../consultar/consultar.php">Consultar Aprendiz</a>
            <a href="../modificar/modificar.php">Modificar Aprendiz</a>
        </div>
        <div class="contenido" id="posicion">
            <h2>Seleccione el Aprendiz que desea Eliminar</h2>
            <?php
            $listaAp = file("../registrar/registro.txt");

            $cantAp = count($listaAp);
            ?>
                <form action="eliminacion.php" method="post">
            <table border="1">
                    <thead>
                        <tr>
                            <th>*</th>
                            <th>id</th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono Fijo</th>
                            <th>Celular</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($index = 0; $index < $cantAp; $index++) {
                            list($ced, $nom, $cor, $tf, $tc) = explode("-", $listaAp[$index]);
                            ?>
                        <input type="hidden" name="accion" value="1">
                        <tr>
                            <td><input type="radio" name="seleccion" value="<?php echo $index; ?>"/></td>
                            <td><?php echo ($index + 1); ?></td>
                            <td><?php echo $ced; ?></td>
                            <td><?php echo $nom; ?></td>
                            <td><?php echo $cor; ?></td>
                            <td><?php echo $tf; ?></td>
                            <td><?php echo $tc; ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
            </table>
                  <input type="submit" id="aling" name="eliminar" value="Eliminar Aprendiz">
                </form>
        </div>
        <?php
          if (isset($mensajeM)) {
              echo $mensajeM;
          }
        ?>
    </body>
</html>
