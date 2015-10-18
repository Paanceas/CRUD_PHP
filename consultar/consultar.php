<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ficha 893311</title>
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
      <a href="https://github.com/Paanceas/CRUD_PHP" target="_blank"><img src="../img/github.png" alt="" /></a>
    </div>
    <div class="contenido">
      <form action="consulta.php" method="post">
        <!-- input par abuscar -->
        <input type="search" name="consulta" placeholder="Buscar...">
        <?php
        if (isset($senialP)) {
            echo $senialP;
        }
        ?>

        <!-- Input para saber por que buscar -->
        <?php
        if (isset($senialB)) {
            echo $senialB;
        }
        ?>
        <div class="radio">
          <input type="radio" name="busqueda" id="cedula" value="cedula">
  				<label for="cedula">Cedula</label>

          <input type="radio" name="busqueda" id="nombre" value="nombre">
  				<label for="nombre">Nombre</label>

          <input type="radio" name="busqueda" id="fijo" value="fijo">
  				<label for="fijo">Tel Fijo</label>

          <input type="radio" name="busqueda" id="celular" value="celular">
  				<label for="celular">Celular</label>
        </div>

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
