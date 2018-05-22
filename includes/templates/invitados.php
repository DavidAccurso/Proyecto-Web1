
    <section class="seccion contenedor">
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
                                <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                                    <img src="img/<?php echo $invitados["url_imagen"]; ?>" alt="imagen invitado">
                                    <p><?php echo $invitados["nombre_invitado"] . " " . $invitados["apellido_invitado"]; ?></p>
                                </a>
                            </div>
                        </li>
                        <div style="display:none;">
                            <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id'];?>">   
                                <h2><?php echo $invitados["nombre_invitado"] . " " . $invitados["apellido_invitado"]; ?></h2>
                                <img src="img\<?php echo $invitados['url_imagen']; ?>" alt="Imagen invitado">
                                <p><?php echo $invitados['descripcion']; ?></p>
                            </div> <!-- invitado-info -->
                        </div> <!-- display:none -->
                    <?php }; ?> <!-- while invitados -->
                </ul>
            </section> <!-- .invitados .contenedor .seccion -->
    </section>
    <?php $conn->close(); ?>