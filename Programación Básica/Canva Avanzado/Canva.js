var texto = document.getElementById("texto_lineas")
var boton = document.getElementById("boton");
var height_width = document.getElementById("rango")
var rango_minimo = height_width.value;
var iteracion = document.getElementById("iterar")
var recarga = document.getElementById("refresh")
var contador = document.getElementById("resultado")

recarga.addEventListener("click", reinicio);//para refrescar página
boton.addEventListener("click", porClick);//para ejecutar el loop por click
texto.addEventListener("paste", onpaste);//para evitar que se pegue texto
rango.addEventListener("change", onchange);//para actualizar página cuando hay cambio de tamaño de lienzo
iteracion.addEventListener("paste", onpaste);


// Contador de iteraciones
 var acumulado = 0;




var d = document.getElementById("dibujito");
var lienzo = d.getContext("2d");
var ancho_lienzo = d.width;
var alto_lienzo = d.height;

// dibujando los marcos
  dibujarLinea("grey",1,1,1,ancho_lienzo-1)
  dibujarLinea("grey",1,ancho_lienzo-1,ancho_lienzo-1,ancho_lienzo-1)
  dibujarLinea("grey",1,1,ancho_lienzo-1,1)
  dibujarLinea("grey",ancho_lienzo-1,1,ancho_lienzo-1,ancho_lienzo-1)

// Loop para interar de acuerdo al box con el número de iteraciones
function porClick(){
  acumulado = parseInt(iteracion.value) + acumulado;
  if (iteracion== 0) {
    return false
  } else {
  for (var i = 0; i < iteracion.value; i++) {
      CrearAleatorio()

  }
  contador.value = "Iteraciones acumuladas " + acumulado;
  contador.disabled = true;
}
}

function dibujarLinea(color, x_inicial, y_inicial, x_final, y_final) {
  lienzo.beginPath();
  lienzo.strokeStyle = color;
  lienzo.moveTo(x_inicial,y_inicial)
  lienzo.lineTo(x_final,y_final)
  lienzo.stroke();
  lienzo.closePath();
}

// Función para crear las estrellas
function CrearAleatorio () {
  document.getElementById("rango").disabled = true;
  var lineas = parseInt(texto.value);
  var espacio = (ancho_lienzo/(2*height_width.value/rango_minimo)/lineas);// ecuación de la variable espacio debe ajustarse a los distintos áreas
  var l = 0;
  var yi, xf;
  var xi, yf;
  var size = Math.floor((Math.random()*3)+1);
  var positionx = randomBetween(-250*height_width.value/rango_minimo,250*height_width.value/rango_minimo);
  var positiony = randomBetween(-250*height_width.value/rango_minimo,250*height_width.value/rango_minimo);
  var color_estrella;
  colorAleatorio();
  // Loop para crear las estrellas en los 4 cuadrantes que la componen
    do {
      yi = espacio * l ;
      xf = (alto_lienzo/2)-(espacio * (l + 1));
      xi = alto_lienzo/2;
      yf = alto_lienzo/2;
      dibujarLinea(color_aleatorio,(xi/size)+positionx,(yi/size)+positiony,(xf/size)+positionx,(yf/size)+positiony);
      yi = espacio * l ;
      xf = (alto_lienzo/2)+(espacio * (l + 1));
      xi = alto_lienzo/2;
      yf = alto_lienzo/2;
      dibujarLinea(color_aleatorio,(xi/size)+positionx,(yi/size)+positiony,(xf/size)+positionx,(yf/size)+positiony);
      yi = (alto_lienzo)-(espacio * l );
      xf = (alto_lienzo/2)-(espacio * (l + 1));
      xi = alto_lienzo/2;
      yf = alto_lienzo/2;
      dibujarLinea(color_aleatorio,(xi/size)+positionx,(yi/size)+positiony,(xf/size)+positionx,(yf/size)+positiony);
      yi = (alto_lienzo)-(espacio * l );
      xf = (alto_lienzo/2)+(espacio * (l + 1));
      xi = alto_lienzo/2;
      yf = alto_lienzo/2;
      dibujarLinea(color_aleatorio,(xi/size)+positionx,(yi/size)+positiony,(xf/size)+positionx,(yf/size)+positiony);
      l++;
    } while (l < lineas);
}

// Función para validar que solo se ingresen números. Raro que el asterisco
// no funciona en la expresión regular, tiene que usarse el signo +
function keyPressValidation(e) {
  var key = e.KeyCode || e.which;
  var teclado = String.fromCharCode(key);
  var prueba = /^[0-9]+/.test(teclado)

  if (prueba == false) {
    return false
  }
}

// Función para evitar que se utilice la opción pegar en la input box
function onpaste(e) {
e.preventDefault()
}

function onchange(e){
  d.width = height_width.value;
  d.height = height_width.value;
  ancho_lienzo = height_width.value;
  dibujarLinea("grey",1,1,1,ancho_lienzo-1);
  dibujarLinea("grey",1,ancho_lienzo-1,ancho_lienzo-1,ancho_lienzo-1);
  dibujarLinea("grey",1,1,ancho_lienzo-1,1);
  dibujarLinea("grey",ancho_lienzo-1,1,ancho_lienzo-1,ancho_lienzo-1);
  alert ("Longitud ha cambiado a "+height_width.value);
}

// Funcion para generar numeros aleatorios
function randomBetween(min, max) {
    if (min < 0) {
        return Math.floor(min + Math.random() * (Math.abs(min)+max));
    }else {
        return Math.floor( min + Math.random() * max);
    }
}

// Funcion para escoger colores aleatoriamente
function colorAleatorio (){
    var hexadecimal = ["green","blue","pink","red","blue","yellow"];
    color_aleatorio = hexadecimal[randomBetween(0,6)];
    return color_aleatorio
}

// Función del botón reinicio
function  reinicio () {
  location.reload()
}
