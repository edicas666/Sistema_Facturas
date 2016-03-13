function validarLetras(){
    if (event.keyCode >=65 && event.keyCode <=90 || event.keyCode >=97 && event.keyCode <= 122){
        event.returnValue = true;
    }else{
        event.returnValue = 0;
    }
}

function validarNumeros(){
    if (event.keyCode >=48 && event.keyCode <=57){
     event.returnValue = true;
    }else{
        event.returnValue = 0;
    }
}

function validarDecimales(e, field){
    key = e.keyCode ? e.keyCode : e.which
    if (key == 8)
    	return true
    if (key > 47 && key < 58) {
      if (field.value == "") return true

      return !(/.[0-9]{5}$/.test(field.value))
    }
    if (key == 46) {
      if (field.value == "") return false
      return /^[0-9]+$/.test(field.value)
    }
    return false
}

function LetrasEspacios(){
    if (event.keyCode >=65 && event.keyCode <=90 ||
       event.keyCode >=97 && event.keyCode <= 122 ||
       event.keyCode == 32 ||
       event.keyCode ==  241 ||
       event.keyCode == 180 ||
       event.keyCode == 225 ||
       event.keyCode == 233 ||
       event.keyCode == 237 ||
       event.keyCode == 243 ||
       event.keyCode == 250 ||
       event.keyCode == 193 ||
       event.keyCode == 201 ||
       event.keyCode == 205 ||
       event.keyCode == 211 ||
       event.keyCode == 218 ||
       event.keyCode == 209){
        event.returnValue = true;
    }else{
        event.returnValue = 0;
    }

}

function LetrasNumeros(){
    if (event.keyCode >=65 && event.keyCode <=90 || event.keyCode >=97 && event.keyCode <= 122
    || event.keyCode >=48 && event.keyCode <=57 || event.keyCode ==  165){
     event.returnValue = true
    }else{
        event.returnValue = 0;
    }
}

function validateMail(idMail)
{

    //Creamos un objeto
    object=document.getElementById(idMail);
    valueForm=object.value;

    // Patron para el correo
    var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    //var patron=/(([a-zA-Z0-9]+[.]?[a-zA-Z0-9]+)*([@]{1})[a-z]{3,10}[.]{1}(\.[a-z]{3}){1})/;
    if(valueForm.search(patron)==0)
    {
        //Mail correcto
        object.style.color="green";
        event.returnValue = true;
        return;
    }
    //Mail incorrecto
    object.style.color="red";
    event.returnValue = 0;
}

function validarCuenta(idCuenta) {
    //Creamos un objeto
    object=document.getElementById(idCuenta);
    valueForm=object.value;

    // Patron para el correo
    //var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    var patron=/^\d{5}[-]{1}\d{5}$/;
    if(valueForm.search(patron)==0)
    {
        //Mail correcto
        object.style.color="green";
        event.returnValue = true;
        return;
    }
    //Mail incorrecto
    object.style.color="red";
    event.returnValue = 0;
}
