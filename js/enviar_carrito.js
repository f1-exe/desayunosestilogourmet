//funcion que ejecuta el submit 
function enviarFormulario(){

    if($('input[name="terms"]').is(":checked")){
        document.getElementById('form_carro').submit()
    }else{
        alert('Debe aceptar los Términos y condiciones para poder continuar');
        window.location.href = 'cart.php';
        //return false;
    } 
}




