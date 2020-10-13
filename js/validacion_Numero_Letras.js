function validarNro(e) {

var key;

if(document.event) // Documento= donde se trabaja actualmente evento= es lo que se produce en el documento 

{
// obtiene el valor de la tecla que se pulsa 
key = e.keyCode;

}

else if(e.which) // Netscape/Firefox/Opera

{
//obtiene la tecla que se presionó para activar el evento
key = e.which;

}

if (key < 48 || key > 57) /*si es menor a 0 y mayor a 9*/  

{

if(key == 46 || key == 8 ){ return true; }  // Detectar . (punto) y backspace (retroceso) borrar

else 
{ return false; }

}

return true; //retorna true para ejecutar la funcion 

}

function validarLetra(l) {

var key;

if(document.event) // IE

{

key = l.keyCode;

}

else if(l.which) // Netscape/Firefox/Opera

{

key = l.which;

}

if ((key != 32)&& (key < 65) || (key > 90) && (key < 97) || (key > 122) && (key ==164) && (key ==165) )

{

if(key == 46 || key == 8 ) // Detectar . (punto) y backspace (retroceso)

{ return true; } else { return false; }

}

return true;

}

function validarEmpaque(e) {

var key;

if(document.event) // Documento= donde se trabaja actualmente evento= es lo que se produce en el documento 

{
// obtiene el valor de la tecla que se pulsa 
key = e.keyCode;

}

else if(e.which) // Netscape/Firefox/Opera

{
//obtiene la tecla que se presionó para activar el evento
key = e.which;

}

if (key < 48 || key > 57) /*si es menor a 0 y mayor a 9*/  

{

if(key == 45 || key == 44 || key == 32 || key == 38 || key == 8 ){ return true; }  // Detectar . (punto) y backspace (retroceso) borrar

else 
{ return false; }

}

return true; //retorna true para ejecutar la funcion 

}

