<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
        <h2>Calendario Eventos</h2>

        <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= " FROM eventos ";
                $sql .= " INNER JOIN categoria_evento ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN invitados ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " ORDER BY eventos.evento_id; ";
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
                    $fecha = $eventos['fecha_evento'];
                    $evento = array(
                        'titulo' => $eventos['nombre_evento'],
                        'fecha' => $eventos['fecha_evento'],
                        'hora' => $eventos['hora_evento'],
                        'categoria' => $eventos['cat_evento'],
                        'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'],
                        'icono' => "fa " . $eventos['icono'] );      
                    $calendario[$fecha][] = $evento; 
                 }; //FIN WHILE de fetch_assoc 
            ?>
            <?php foreach ($calendario as $dia => $lista_eventos) { ?>
                <h3>
                    <i class="fa fa-calendar"></i>
                    <?php 
                        setlocale(LC_TIME, 'spanish');
                        echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia)));//utf8_encode() hace que el texto
                        //que se pasa como parametro se muestre correctamente si lleva ñ o acentos
                    ?>
                </h3>
                <?php
                    foreach ($lista_eventos as $evento) { ?>
                        <div class="dia">
                            <p class="titulo"><?php echo utf8_encode($evento['titulo']); ?></p>
                            <p class="hora"><i class="far fa-clock" aria-hidden="true"></i><?php echo $evento['fecha'] . " - " . $evento['hora']; ?></p>
                            <p><i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i><?php echo $evento['categoria']; ?></p>
                            <p class="invitado"><i class="far fa-user"></i><?php echo $evento['invitado']; ?></p>
                        </div>
                <?php }; //Fin foreach eventos?>
            <?php  };//Fin foreach dias?>
        </div> <!-- .calendario -->
    </section>
    <?php $conn->close(); ?>
<?php include_once 'includes/templates/footer.php'; ?>