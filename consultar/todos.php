<?php
include 'consultar.php';
$listaAp = file("../registrar/registro.txt");

$cantAp = count($listaAp);
?>
<div class="contenido">
    <table border="1">
        <thead>
            <tr>
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
</div>
