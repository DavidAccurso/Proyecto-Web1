function initMap() {
  var latLng = {
    lat: -32.9284726,
    lng: -60.7279232
  };
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('mapa'), {
    //center: {lat: -32.9284726, lng: -60.7279232},
    center: latLng,
    zoom: 13,
    'mapTypeId': google.maps.MapTypeId.ROADMAP
  });
  var contenido = '<h2>GDLWEBCAMP</H2>' +
                   '<p>Del 10 al 12 de Abril</p>' +
                   '<p>Visitanos!</p>' +
                   '<p>Cordoba y Circunvalacion, Rosario, Sta Fe, Arg.</p>'
  var info = new google.maps.InfoWindow({
    content: contenido
  });
  var marker = new google.maps.Marker({
    position: latLng,
    map: map,
    title: 'Ubicacion'
  });
  marker.addListener('click', function(){
    info.open(map, marker);
  });
}

(function(){
  'use strict';
  document.addEventListener('DOMContentLoaded', function(){

  //Datos usuarios
  var nombre = document.getElementById('nombre');
  var apellido = document.getElementById('apellido');
  var email = document.getElementById('email');
  //Campos pases
  var pase_dia = document.getElementById('pase_dia');
  var pase_completo = document.getElementById('pase_completo');
  var pase_dos_dias = document.getElementById('pase_dos_dias');
  //Botones y divs
  var calcular = document.getElementById('calcular');
  var errorDiv = document.getElementById('error');
  var botonRegistro = document.getElementById('btnRegistro');
  var lista_productos = document.getElementById('Lista-productos');
  var suma = document.getElementById('suma-total');
  //calcularMontos
  var regalo = document.getElementById('regalo');
  var etiquetas = document.getElementById('etiquetas');
  var camisas = document.getElementById('camisa_evento');

  if (document.getElementById('calcular')) {

    calcular.addEventListener('click', calcularMontos);
    pase_dia.addEventListener('blur', mostrarDias);
    pase_dos_dias.addEventListener('blur',mostrarDias);
    pase_completo.addEventListener('blur',mostrarDias);
    nombre.addEventListener('blur', validarCampos);
    apellido.addEventListener('blur', validarCampos);
    email.addEventListener('blur', validarCampos);
    email.addEventListener('blur', validarEmail);

    function validarEmail() {
      if(this.value.indexOf("@") > -1 ) {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #e1e1e1';
      }
      else {
        errorDiv.style.display = 'block';
        errorDiv.innerHTML = "Debe tener formato de Email";
        this.style.border = '1px solid red';
        errorDiv.style.border = '1px solid red';
      }
    }
    function validarCampos(){
      if (this.value == '') {
      errorDiv.style.display = 'block';
      errorDiv.innerHTML = "Este campo es obligatorio";
      this.style.border = '1px solid red';
      errorDiv.style.border = '1px solid red';
      }
      else {
        errorDiv.style.display = 'none';
        this.style.border = '1px solid #e1e1e1';
      }
      }
    function mostrarDias(){
        var boletosDia = parseInt(pase_dia.value,10) || 0,
            boletos2Dias = parseInt(pase_dos_dias.value,10) || 0,
            boletoCompleto = parseInt(pase_completo.value,10) || 0;
        var diasElegidos = [];
        if (boletosDia > 0) {
          diasElegidos.push('viernes');
        }
        if (boletos2Dias > 0) {
          diasElegidos.push('viernes','sabado');
        }
        if (boletoCompleto > 0) {
          diasElegidos.push('viernes','sabado','domingo');
        }
        //Los vuelvo a ocultar - Modificacion mia
        document.getElementById('viernes').style.display = 'none';
        document.getElementById('sabado').style.display = 'none';
        document.getElementById('domingo').style.display = 'none';
        //Los muestro si fueron seleccionados
        for (var i = 0; i < diasElegidos.length; i++) {
          document.getElementById(diasElegidos[i]).style.display = 'block';
        }
      }
    function calcularMontos(event) {
      event.preventDefault(); //Previene accion por defecto. Ej link no abre pag
      if (regalo.value === '') {
        alert('Debes elegir un regalo');
        regalo.focus();
      }
      else {
        var boletosDia = parseInt(pase_dia.value,10) || 0,
            boletos2Dias = parseInt(pase_dos_dias.value,10) || 0,
            boletoCompleto = parseInt(pase_completo.value,10) || 0,
            cantCamisas = parseInt(camisas.value,10) || 0,
            cantEtiquetas = parseInt(etiquetas.value,10) || 0;
            //El parseInt usa como segundo parametro el sistema decimal 10
            //de esa forma si el usuario mete caracteres no validos, en lugar de regresar NaN, regresará un 0
        var totalPagar = (boletosDia * 30) +
                         (boletos2Dias * 45) +
                         (boletoCompleto * 50) +
                         ((cantCamisas * 10) * .93 ) +
                         (cantEtiquetas * 2);
        var listadoProductos = [];
        if (boletosDia > 0) {
          listadoProductos.push(boletosDia + ' Pases por dia');
        }
        if (boletos2Dias > 0) {
          listadoProductos.push(boletos2Dias + ' Pases por 2 dias');
        }
        if (boletoCompleto > 0) {
          listadoProductos.push(boletoCompleto + ' Pases competos');
        }
        if (cantCamisas > 0) {
          listadoProductos.push(cantCamisas + ' Camisas');
        }
        if (cantEtiquetas > 0) {
          listadoProductos.push(cantEtiquetas + ' Etiquetas');
        }
        lista_productos.style.display = "block";
        lista_productos.innerHTML = '';
        for (var i = 0; i < listadoProductos.length; i++) {
          lista_productos.innerHTML += listadoProductos[i] + '<br/>';
        }
        if (listadoProductos.length == 0) {
          lista_productos.style.display = "none";
        }
        suma.innerHTML = "$ " + totalPagar.toFixed(2);
      }
    } //Fin Function Boton calcular
  }
}
  ); //DOM CONTENT LOADED
})(); //Fin codigo para pagina de registro

//Inicio de tabs para talleres conferencias y seminarios
$(function() {
  $('.programa-evento .info-curso:first').show();
  $('.menu-programa a:first').addClass('activo');
  $('.menu-programa a').on('click',function() {
      $('.menu-programa a').removeClass('activo');//saca todos los activos
      $(this).addClass('activo');//se agrega el q se dio click como activo
      $('div.ocultar').fadeOut(200); //oculta todos
      var enlace = $(this).attr('href')
      $(enlace).fadeIn(500); //muestra el enlace presionado
      return false; // para que no haga saltito al apretar click
  });

  //lettering
  $('.nombre-sitio').lettering();

  //agregar clase a menu
  $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
  $('body.reservaciones .navegacion-principal a:contains("Reservaciones")').addClass('activo');
  // Menu Fijo
  var windowHeight = $(window).height(); //alto de la ventana
  var barraAltura = $('div.barra').innerHeight();

  $(window).scroll(function () { //detecta cuando se da scroll
      var scroll = $(window).scrollTop();
      if (scroll > windowHeight) {
        $('div.barra').addClass('fixed');
        $('body').css({'margin-top': barraAltura+'px'}) //para evitar saltito
      }
      else {
        $('div.barra').removeClass('fixed');
        $('body').css({'margin-top': '0px'})
      }
  });

  //Menu Responsive
  $('div.menu-movi').on('click',function () {
    $('.navegacion-principal').slideToggle();
  });

  //animaciones para los numeros - plugin animateNumber
  //WAYPOINTS para controlar en que parte de la pantalla te encontras
  //se le aplica a un objeto, en este caso resumen-Evento
  var resumenLista = $('.resumen-evento');
  if (resumenLista.length > 0) {
    resumenLista.waypoint(function() { //ejecuta esta funcion cuando cumple
      $('.resumen-evento li:nth-child(1) p').animateNumber({number:6},4000);
      $('.resumen-evento li:nth-child(2) p').animateNumber({number:15},2500);
      $('.resumen-evento li:nth-child(3) p').animateNumber({number:3},3500);
      $('.resumen-evento li:nth-child(4) p').animateNumber({number:9},3800);
    }, {
      offset: '60%'//cuando se llega al 60% visible del objeto
    });
  };

  //animacion cuenta regresiva - plugin countdown
  $('.cuenta-regresiva').countdown('2019/11/29 09:00:00', function (event) {
    $('#dias').html(event.strftime('%D'));
    $('#horas').html(event.strftime('%H'));
    $('#minutos').html(event.strftime('%M'));
    $('#segundos').html(event.strftime('%S'));
  });

  // ColorBox
  $('.invitado-info').colorbox({inline:true,width:"60%"});

});
