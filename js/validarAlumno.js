function validar() {
    var nombre, matricula, carrera, email, telefono, sexo, username, contra, expresion;
    var s = false;
    var campos = [];
    
    nombre = document.getElementById("nombre").value;
    matricula = document.getElementById("matricula").value;
    carrera = document.getElementById("carrera").value;
    email = document.getElementById("email").value;
    telefono = document.getElementById("telefono").value;
    sexo = document.formAlumno.sexo;
    username = document.getElementById("username").value;
    contra = document.getElementById("contra").value;

    expresion = /\w+@+\w+\.+[a-z]/;

    if(nombre === "" || matricula === "" || carrera === "" || email === "" || username === "" || contra === "") {
        alert("Todos los campos son obligatorios, excepto el Teléfono");
        return false;
    } 
    else if(nombre.length > 250) {
        alert("El nombre es muy largo");
        return false;
    }
    else if(username.length > 100) {
        alert("El username es muy largo");
        return false;
    }
    else if(email.length > 100) {
        alert("El email es muy largo");
        return false;
    }
    else if(!expresion.test(email)) {
        alert("El email no es válido");
        return false;
    }
    else if(telefono.length > 10) {
        alert("El teléfono solo es de 10 dígitos");
        return false;
    }
    else if(contra.length > 40) {
        alert("La contraseña es demasiado larga");
        return false;
    }
    else if(isNaN(telefono)) {
        alert("El teléfono contiene caracteres inválidos");
        return false;
    }

    for(var i=0; i<sexo.length;i++) {
        if(sexo[i].checked) {
            s=true;
            break;
        }
    }
    if(!s) {
        alert("Debe seleccionar sexo");
        return false;
    }
}