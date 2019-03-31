//funcion que ejecuta el submit 
function enviarFormulario(){
    
    if($('input[name="terms"]').is(":checked")){
        document.getElementById('form_cart').submit();
        return true;
    }else{
        MensajeAlerta('Debe aceptar los Términos y condiciones para poder continuar');
        return false;
    } 
}

function MensajeAlerta(msg) {
    Swal.fire({
        title: "Atención",
        type: "info",
        html: msg,
        animation: false,
        customClass: "animated tada"
    })
}


