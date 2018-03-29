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
  function validarCampos()
  {
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


}); //DOM CONTENT LOADED
})();
