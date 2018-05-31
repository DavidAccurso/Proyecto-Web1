º<?php include_once 'includes/templates/header.php' ?>

      <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      </section> <!-- .seccion .contenedor -->

      <section class="programa">
        <div class="contenedor-video">
          <video autoplay loop poster="img/bg-talleres.jpg">
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogg">
          </video>
        </div> <!-- .contenedor-video -->
        <div class="contenido-programa contenedor">
          <div class="programa-evento">
          <h2>Programa del Evento</h2>
              <?php
                try {
                    require_once 'includes/funciones/bd_conexion.php';
                    $sql = "SELECT * FROM `categoria_evento`";
                    $resultado = $conn->query($sql);
                }
                catch(Exception $e) {
                    $error = $e->getMessage();
                }
              ?>
              <nav class="menu-programa">
              <?php while($cat = $resultado->fetch_assoc()) { ?>
                <?php $categoria = $cat['cat_evento']; ?>
                <a href="# <?php echo strtolower($categoria); ?>">
                <i class="fa <?php echo $cat['icono']; ?>"></i><?php echo $categoria; ?></a>
                <?php } ?>
              </nav> <!-- nav.menu-programa -->

              <?php
                  try {
                      require_once('includes/funciones/bd_conexion.php');
                      $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                      $sql .= " FROM eventos ";
                      $sql .= " INNER JOIN categoria_evento ";
                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                      $sql .= " INNER JOIN invitados ";
                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                      $sql .= " WHERE `eventos`.`id_cat_evento` = 1 "
                      $sql .= " ORDER BY eventos.evento_id LIMIT 2; ";
                      $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                      $sql .= " FROM eventos ";
                      $sql .= " INNER JOIN categoria_evento ";
                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                      $sql .= " INNER JOIN invitados ";
                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                      $sql .= " WHERE `eventos`.`id_cat_evento` = 2 "
                      $sql .= " ORDER BY eventos.evento_id LIMIT 2; ";
                      $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                      $sql .= " FROM eventos ";
                      $sql .= " INNER JOIN categoria_evento ";
                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                      $sql .= " INNER JOIN invitados ";
                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                      $sql .= " WHERE `eventos`.`id_cat_evento` = 3 "
                      $sql .= " ORDER BY eventos.evento_id LIMIT 2; ";
                      $conn->multi_query($sql);
                  }
                  catch (\Excepcion $e) {
                         echo $e->getMessage();
                  }
              ?>
              <?php
                do {
                  $resultado = $conn->store_result();
                  $row = $resultado->fetch_assoc(MYSQLI_ASSOC); ?>

                  <?php $i = 0; ?>
                  <?php foreach($row as $evento): ?>
                      <?php if($i % 2 == 0) { ?>
                        <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                      <?php } ?>
                            <div class="detalle-evento">
                                <h3><?php utf8_encode($evento['nombre_evento']) ?></h3>
                                <p><i class="far fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                                <p><i class="far fa-calendar-alt"></i><?php echo $evento['fecha_evento']; ?></p>
                                <p><i class="fa fa-user"></i><?php echo $evento['nombre_invitado']; ?></p>
                            </div>
                      <?php if($i % 2 == 1): ?>
                          </div> <!-- talleres  -->
                          <a href="#" class="button float-rigth">Ver todos</a>
                      <?php endif; ?>
                      <?php $i++; ?>
                  <?php endforeach; ?>
                <?php } while($conn->more_results() && $conn->next_result()); ?>
                <?php $resultado->free(); ?>
          </div> <!-- .programa-evento -->
        </div> <!-- .contenido-programa .contenedor -->
      </section> <!-- FIN SECCION .PROGRAMA -->

      <!-- carga 'div.invitados' 'section.invitados contenedor seccion'-->
      <?php include_once 'includes/templates/invitados.php'; ?>

      <div class="contador parallax">
        <div class="contenedor">
          <ul class="resumen-evento clearfix">
            <li><p class="numero">0</p>Invitados</li>
            <li><p class="numero">0</p>Talleres</li>
            <li><p class="numero">0</p>Dias</li>
            <li><p class="numero">0</p>Conferencias</li>
          </ul>
        </div> <!-- .contenedor -->
      </div> <!-- .contador .parallax -->

      <section class="precios seccion">
        <h2>Precios</h2>
          <div class="contenedor">
            <ul class="lista-precios clearfix">
              <li>
                <div class="tabla-precio">
                  <h3>Pase por día</h3>
                  <p class="numero">$30</p>
                  <ul>
                    <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                    <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                    <li><i class="fas fa-check"></i>Todos los Talleres</li>
                  </ul>
                  <a href="#" class="button hollow">Comprar</a>
                </div> <!-- .tabla-precio -->
              </li> <!-- li Pase por dia -->
              <li>
                <div class="tabla-precio">
                  <h3>Todos los días</h3>
                  <p class="numero">$50</p>
                  <ul>
                    <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                    <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                    <li><i class="fas fa-check"></i>Todos los Talleres</li>
                  </ul>
                  <a href="#" class="button">Comprar</a>
                </div> <!-- .tabla-precio -->
              </li> <!-- li Todos los dias -->
              <li>
                <div class="tabla-precio">
                  <h3>Pase por 2 días</h3>
                  <p class="numero">$45</p>
                  <ul>
                    <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                    <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                    <li><i class="fas fa-check"></i>Todos los Talleres</li>
                  </ul>
                  <a href="#" class="button hollow">Comprar</a>
                </div> <!-- .tabla-precio -->
              </li> <!-- li Pase por 2 dias -->
            </ul>
          </div>
      </section>

      <div id="mapa" class="mapa"></div>

      <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <footer class="info-testimonial clearfix">
                  <img src="img\testimonial.jpg" alt="Imagen Testimonial">
                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
                </footer>
              </blockquote>
            </div> <!-- .testimonial -->
            <div class="testimonial">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <footer class="info-testimonial clearfix">
                  <img src="img\testimonial.jpg" alt="Imagen Testimonial">
                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
                </footer>
              </blockquote>
            </div> <!-- .testimonial -->
            <div class="testimonial">
              <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <footer class="info-testimonial clearfix">
                  <img src="img\testimonial.jpg" alt="Imagen Testimonial">
                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span> </cite>
                </footer>
              </blockquote>
            </div> <!-- .testimonial -->
        </div> <!-- .testimoniales .contenedor .clearfix -->
      </section> <!-- seccion testimoniales -->

      <div class="newsletter parallax">
        <div class="contenido contenedor">
          <p>Registrate al newsletter</p>
          <h3>gdlwebcamp</h3>
          <a href="#" class="button transparent">registro</a>
        </div> <!-- .contenido .contenedor -->
      </div> <!-- .newsletter .parallax -->
      <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva clearfix contenedor">
          <ul>
            <li><p id="dias" class="numero"></p>dias</li>
            <li><p id="horas" class="numero"></p>horas</li>
            <li><p id="minutos" class="numero"></p>minutos</li>
            <li><p id="segundos" class="numero"></p>segundos</li>
          </ul>
        </div>
      </section>
<?php include_once 'includes/templates/footer.php' ?>
