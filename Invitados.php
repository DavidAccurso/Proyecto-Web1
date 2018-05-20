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
            }
        ?>
        <div class="invitados">
            <?php 
                $calendario = array();
                while($eventos = $resultado->fetch_assoc() ){ 
                    //$fecha = $eventos['fecha_evento'];
                    $evento = array(
                        'id' => $eventos['invitado_id'],
                        'nombre' => $eventos['nombre_invitado'],
                        'apellido' => $eventos['apellido_invitado'],
                        'descripcion' => $eventos['descripcion'],
                        'url' => $eventos['url_imagen']);      
                    //$calendario[$fecha][] = $evento; 
                 }; //FIN WHILE de fetch_assoc 
            ?>
        </div> <!-- .calendario -->
    </section>
    <?php $conn->close(); ?>
<?php include_once 'includes/templates/footer.php'; ?>