<?php include_once 'includes/templates/header.php' ?>

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
              <nav class="menu-programa">
                <a href="#talleres"><i class="fa fa-code"></i>Talleres</a>
                <a href="#conferencias"><i class="fa fa-comment"></i>Conferencias</a>
                <a href="#seminarios"><i class="fa fa-university"></i>Seminarios</a>
              </nav>

              <div id="talleres" class="info-curso ocultar clearfix">
                  <div class="detalle-evento">
                      <h3>HTML5, CSS3 y JavaScript</h3>
                      <p><i class="far fa-clock"></i>16:00 hs</p>
                      <p><i class="far fa-calendar-alt"></i>12 de Dic</p>
                      <p><i class="fa fa-user"></i>Davidsinhio de la torre</p>
                  </div>
                  <div class="detalle-evento">
                      <h3>Responsive Web Design</h3>
                      <p><i class="far fa-clock"></i>20:00 hs</p>
                      <p><i class="far fa-calendar-alt"></i>12 de Dic</p>
                      <p><i class="fa fa-user"></i>Popeye el marino</p>
                  </div>
                  <a href="#" class="button float-rigth">Ver todos</a>
              </div> <!-- talleres  -->

              <div id="conferencias" class="info-curso ocultar clearfix">
                  <div class="detalle-evento">
                      <h3>Como ser Freelancer</h3>
                      <p><i class="far fa-clock"></i>10:00 hs</p>
                      <p><i class="far fa-calendar-alt"></i>10 de Dic</p>
                      <p><i class="fa fa-user"></i>Gregorio De la Cruz</p>
                  </div>
                  <div class="detalle-evento">
                      <h3>Tecnologías del futuro</h3>
                      <p><i class="far fa-clock"></i>16:00 hs</p>
                      <p><i class="far fa-calendar-alt"></i>10 de Dic</p>
                      <p><i class="fa fa-user"></i>Susana Gimenez</p>
                  </div>
                  <a href="#" class="button float-rigth">Ver todos</a>
              </div> <!-- conferencias -->

              <div id="seminarios" class="info-curso ocultar clearfix">
                  <div class="detalle-evento">
                      <h3>Aprender a programar en minutos</h3>
                      <p><i class="far fa-clock"></i>13:00 hs</p>
                      <p><i class="far fa-calendar-alt"></i>11 de Dic</p>
                      <p><i class="fa fa-user"></i>El oso Arturo</p>
                  </div>
                  <div class="detalle-evento">
                      <h3>Diseño UI/UX para móviles</h3>
                      <p><i class="far fa-clock"></i>17:00 hs</p>
                      <p><i class="far fa-calendar-alt"></i>11 de Dic</p>
                      <p><i class="fa fa-user"></i>Marcelo Tinelli</p>
                  </div>
                  <a href="#" class="button float-rigth">Ver todos</a>
              </div> <!-- seminarios -->

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