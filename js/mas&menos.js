function mas(stock){
    var valor = document.getElementById('qty').value;

    if(valor < stock){
        suma = parseInt(valor)+1;
        document.getElementById('qty').value = suma;
        //alert("Se suma por que el valor es menor o igual a estock "+suma);
    }else{
        alert("no se puede agregar mas ");
    }

}

function menos(stock){
    var valor = document.getElementById('qty').value;

    if(valor > 1){
        if(valor <= stock){
            suma = parseInt(valor)-1;
            document.getElementById('qty').value = suma;
            //alert("Se suma por que el valor es menor o igual a estock "+suma);
        }else{
            alert("no se puede quitar mas ");
        }
    }else{
        alert("El valor debe ser mayor que 1 para quitar productos");
    }
    
}

// function formatNumber(num) {
//     return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
// }

function masCart(stock, id_p, id){
    var valor = document.getElementById('qty_'+id).value;
    var precio = document.getElementById('precio_'+id).value;
    var monto = document.getElementById('monto_total').value;

    if(valor < stock){
        suma = parseInt(valor)+1;
        total = parseInt(monto) + parseInt(precio);
        document.getElementById('qty_'+id).value = suma;
        document.getElementById('ee').innerHTML = total;
        document.getElementById('monto_total').value = total;

        $.post("actualizarCantidad.php", {
            id_producto: id_p,
            cantidad: suma
        })
    }else{
        alert("no se puede agregar mas ");
    }

}

function menosCart(stock, id_p, id){
    var valor = document.getElementById('qty_'+id).value;
    var precio = document.getElementById('precio_'+id).value;
    var monto = document.getElementById('monto_total').value;


    if(valor > 1){
        if(valor <= stock){
            resta = parseInt(valor)-1;
            total = parseInt(monto) - parseInt(precio);
            document.getElementById('qty_'+id).value = resta;
            document.getElementById('ee').innerHTML = total;
            document.getElementById('monto_total').value = total;

            
            $.post("actualizarCantidad.php", {
                id_producto: id_p,
                cantidad: resta
            })
        }else{
            alert("no se puede quitar mas ");
        }
    }else{
        alert("El valor debe ser mayor que 1 para quitar productos");
    }
    
}