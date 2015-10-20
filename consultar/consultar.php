<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consultar Aprendiz</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <h1>Ficha 893311 Fontibon</h1>
    <div class="links">
      <img src="../img/sena.png"/>
      <a href="../modificar/modificar.php">Modificar Aprendiz</a>
      <a href="../eliminar/eliminar.php">Eliminar Aprendiz</a>
      <a href="../registrar/registrar.php">Registrar Aprendiz</a>
    </div>
    <div class="contenido">
      <form action="consulta.php" method="post">
        <!-- Input para saber por que buscar -->
        <?php
        if (isset($senialB)) {
            echo $senialB;
        }
        ?>
        <div class="radio">
          <select name="busqueda">
            <option value="">Buscar Por...</option>
            <option value="cedula">Cedula</option>
            <option value="nombre">Nombre</option>
            <option value="telefono">Telefono</option>
            <option value="celular">Celular</option>
          </select>
        </div>

        <!-- input para buscar -->
        <input type="search" name="consulta" placeholder="Buscar...">
        <?php
        if (isset($senialP)) {
            echo $senialP;
        }
        ?>

        <!-- input de envio del formulario -->
        <input type="submit" name="consultar" value="consultar">
        <a href="todos.php" class="btn">Consultar todos</a>
      </form>
    </div>
    <?php
    if (isset($mensajeT)) {
        echo $mensajeT;
    } else {
        if (isset($mensajeB)) {
            echo $mensajeB;
        }
        if (isset($mensajeP)) {
            echo $mensajeP;
        }
    }
    ?>
  </body>
</html>
