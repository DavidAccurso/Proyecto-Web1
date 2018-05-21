<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
        <h2>Invitados</h2>
        <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado, descripcion, url_imagen ";
                $sql .= " FROM invitados;";
                $resultado = $conn->query($sql);
            }
            catch (\Excepcion $e) {
                   echo $e->getMessage();
                   $error = $e->getMessage();
            }
        ?>
        <div class="invitados">
            <section class="invitados contenedor seccion">
                <h2>Nuestros invitados</h2>
                <ul class="lista-invitados clearfix">
                    <?php while($invitados = $resultado->fetch_assoc() ){ ?>                       
                         <li>
                            <div class="invitado">
                                <img src="img/<?php echo $invitados["url_imagen"]; ?>" alt="imagen invitado">
                                <p><?php echo $invitados["nombre_invitado"] . " " . $invitados["apellido_invitado"]; ?></p>
                            </div>
                        </li>
                <?php }; ?>
                </ul>
            </section> <!-- .invitados .contenedor .seccion -->
    </section>
    <?php $conn->close(); ?>
<?php include_once 'includes/templates/footer.php'; ?>