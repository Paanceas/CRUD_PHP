<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificar Aprendiz</title>
        <link rel="stylesheet" href="../css/estilo.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <h1>Editar Aprendiz</h1>
        <div class="links">
            <img src="../img/sena.png"/>
            <a href="../registrar/registrar.php">Registrar Aprendiz</a>
            <a href="../consultar/consultar.php">Consultar Aprendiz</a>
            <a href="../eliminar/eliminar.php">Eliminar Aprendiz</a>
        </div>
        <div class="contenido">
            <h2>Seleccione el Aprendiz que desea Modificar</h2>
            <?php
            $listaAp = file("../registrar/registro.txt");

            $cantAp = count($listaAp);
            ?>
            <table border="1">
                <form name="forModBor" action="actualizacion.php" method="post">
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
                            <td><input type="radio" name="seleccion" value="<?php echo $index; ?>" onclick="document.forModBor.submit();"/></td>
                            <td><?php echo ($index + 1); ?></td>
                            <td><?php echo $ced; ?></td>
                            <td><?php echo $nom; ?></td>
                            <td><?php echo $cor; ?></td>
                            <td><?php echo $tf; ?></td>
                            <td><?php echo $tc; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </form>
            </table>
        </div>
        <?php
          if (isset($mensajeM)) {
              echo $mensajeM;
          }
        ?>
    </body>
</html>
