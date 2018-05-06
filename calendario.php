<?php include_once 'includes/templates/header.php' ?>

    <section class="seccion contenedor">
        <h2>Calendario Eventos</h2>

        <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " ORDER BY eventos.evento_id " ;//tira error :S
                $resultado = $conn->query($sql);
            }
            catch (\Excepcion $e) {
                   echo $e->getMessage(); 
            }
        ?>
        <div class="calendario">
            <?php 
                $calendario = array();
                while($eventos = $resultado->fetch_assoc() ){ 
                    $evento = array(
                        'titulo' => $eventos['nombre_evento'],
                        'fecha' => $eventos['fecha_evento'],
                        'hora' => $eventos['hora_evento'],
                        'categoria' => $eventos['cat_evento'],
                        'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'] );      

                    $calendario[] = $evento;
            ?>
            <?php } //FIN WHILE de fetch_assoc ?>
            <pre>
                    <?php var_dump($calendario); ?>
            </pre>
        </div>
    </section>

    <?php $conn->close(); ?>
<?php include_once 'includes/templates/footer.php' ?>