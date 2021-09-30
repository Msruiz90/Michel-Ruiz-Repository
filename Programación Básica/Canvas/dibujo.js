var texto = document.getElementById('texto_lineas')
var boton = document.getElementById('botoncito');
boton.addEventListener("click", dibujoporClick);  //Evento botón - primero determinamos el evento y egundo que ejecutar

var d = document.getElementById('dibujito');
var ancho = d.width;
var lienzo = d.getContext('2d');

function dibujarLinea(color, xInicial, yInicial, xFinal, yFinal) {
  lienzo.beginPath();
  lienzo.strokeStyle = color;
  lienzo.moveTo(xInicial, yInicial);
  lienzo.lineTo(xFinal, yFinal);
  lienzo.stroke();
  lienzo.closePath();
}

function dibujoporClick()
{
  lienzo.clearRect(0,0,300,300); //Permite no tener que refrescar la página
  var xxx = parseInt(texto.value);
  var lineas = xxx;
  var yIni, xFin;
  var xFin2;
  var colorcito = "skyblue";
  var espacio = ancho / lineas;

  for (var i = 0; i < lineas; i++) {
    yIni = espacio * i;
    xFin = espacio * (i + 1);
    xFin2 = 300 - (i * espacio);
    dibujarLinea(colorcito, 0, yIni, xFin, 300); // Esquina Inferior-Izquierda
    dibujarLinea(colorcito, 300, yIni, xFin2, 300); // Esquina Inferior-Derecha
    dibujarLinea(colorcito, xFin2, 0, 0, xFin); // Esquina Superior-Izquierda
    dibujarLinea(colorcito, 300, xFin2, xFin2, 0); // Esquina Superior-Derecha
  }
  /* Dibujar las líneas de los bordes */
  dibujarLinea(colorcito, 0, 0, 0, 300);
  dibujarLinea(colorcito, 0, 300, 300, 300);
  dibujarLinea(colorcito, 0, 0, 300, 0);
  dibujarLinea(colorcito, 300, 0, 300, 300);
}


/*
var d = document.getElementById("dibujito"); //Método de doucment... Obtenemos un objeto, obtenemos Id
var lienzo = d.getContext("2d"); //Método del canvas - Funcion objeto canvas me permite obtener el área donde dibujaré
var lineas = 30;
var l = 0;
var yi, xf;
var tono = "red";

//Ciclo crear 30 lineas

for (l = 0; l < lineas; l++ )
{
  //Llamar función
  yi = 10 * l;
  xf = 10 * (l + 1);
  dibujarLinea(tono, 0, yi, xf, 300);
  console.log("linea " +l); //Probar en consola que me está haciendo 30 lineas
}

/*while (l < lineas)
{
  //Llamar función
  yi = 10 * l;
  xf = 10 * (l + 1);
  dibujarLinea(tono, 0, yi, xf, 300);
  console.log("linea " +l); //Probar en consola que me está haciendo 30 lineas
  l++;
}*/
/*
dibujarLinea(tono, 1, 1, 1, 299);
dibujarLinea(tono, 1, 299, 299, 299);


//Crear Función
function dibujarLinea(color, xinicial, yinicial, xfinal, yfinal)
{
  lienzo.beginPath(); //así arranca un trazo
  lienzo.strokeStyle = color; //Variable, atributo - color de la linea
  lienzo.moveTo(xinicial, yinicial);  //función mover lapiz en canvas a donde arrancará la linea
  lienzo.lineTo(xfinal, yfinal);   //Trazar la linea
  lienzo.stroke(); //Dibuja la linea
  lienzo.closePath(); //Cerramos el trazo, lavantamos el lapiz
}

//Las funciones ocurren cuando abre y cierra parentesis sino sería una variable
*/
