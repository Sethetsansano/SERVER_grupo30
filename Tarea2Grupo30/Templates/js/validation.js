function UserDataValidation(){
  var uname = document.getElementById('username');
  if(!uname.value){
    ShowAlert("Debe ingresar nombre de usuario.");
    uname.focus();
    return false;
  }

  var nombre = document.getElementById('person-name');
  if (!nombre.value){
    ShowAlert("Debe ingresar su nombre.");
    nombre.focus();
    return false;
  }
  var password = document.getElementById('password');
  if(!password.value){
    ShowAlert("Debe ingresar contraseña.");
    password.focus();
    return false;
  }
  var passwordConfirmation = document.getElementById('password-confirmation');
  if (!passwordConfirmation.value){
    ShowAlert("Debe confirmar su contraseña.");
    passwordConfirmation.focus();
    return false;
  }else{
    if (passwordConfirmation.value !== password.value){
      ShowAlert("Las contraseñas ingresadas deben coincidir.");
      passwordConfirmation.focus();
      return false;
    }
  }
  return true;
}

function FilterValidation(){
  var origen = document.getElementById("originSelection");
  var idOrigen = origen.options[origen.selectedIndex].value;

  var destino = document.getElementById("destinySelection");
  var idDestino = destino.options[destino.selectedIndex].value;

  if (idOrigen === idDestino){
    ShowAlert("Ciudad de origen y destino no pueden coincidir, asegurese de cambiar una.");
    destino.focus();
    return false;
  }
  return true;
}

function ValidateSeatsSelected(){
  var seatsSelected = document.getElementsByName("seatsValue[]");
  for (k = 0; k < seatsSelected.length; k++){
    if (seatsSelected[k].checked)
      return true;
  }
  ShowAlert("Debe seleccionar al menos un asiento para continuar.");
  return false;
}

function ValidateTravel(){

  var horarioSalida = document.getElementById("horario-salida-id");
  if (!horarioSalida.value){
    ShowAlert("Debe ingresar horario de salida");
    return false;
  }
  var horarioLlegada = document.getElementById("llegada-estimada-id");
  if (!horarioLlegada.value){
    ShowAlert("Debe ingresar horario de llegada");
    return false;
  }
  var nombre = document.getElementById("id-nombre");
  if (!nombre.value){
    ShowAlert("Debe ingresar nombre de recorrido");
    return false;
  }
  var precio = document.getElementById("precio");
  if (!precio.value){
    ShowAlert("Debe ingresar precio del recorrido");
    return false;
  }
  var cities = FilterValidation();
  if (cities){
    return true;
  }
  return false;
}


function ShowErrorMessage(){
  ShowAlert("Usuario y/o contraseña incorrectos. Reintente.");
}


function ShowAlert(msg){
  var error = document.getElementById('error');
  error.innerHTML = msg;
  error.style.display = 'block';
}
