//funcion para formatear el precio a formato de moneda
function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

function modal(nombre_producto, precio,id,imagen){
    Swal({
        title: '<h3 style="color:#0E9700;">Agregado al carrito!</h3>',
        html: '<table style="width:100%;">'+
                '<tr>'+
                    '<td>Producto:</td>'+
                    '<td>'+nombre_producto+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Precio:</td>'+
                    '<td>$ '+formatNumber(precio)+'</td>'+
                '</tr>'+
            '</table>'+
            '<br>'+
            '<div style="text-align:center;">'+
                '<td colspan="2"><a href="../cart.php"><button class="btn btn-primary">Revisar el carrito</button></a><td>'+
                '<hr>'+
                '<a href="javascript:void(0)" onclick="Swal.close();">o siguir comprando</a>'+
            '</div>',
        imageUrl: '/Proyectos/desayunosestilogourmet/img/productos/'+imagen,
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Producto Desayuno Estilo Gourmet',
        animation: false,
        showCloseButton: true,
        showConfirmButton: false
      });
}

//este modal se lista solo en el index, ya que las categorias estan otro directorio al momento de utilizar 
//el modal de arriba no se puede llagar a las imagenes del producto ya que no estan en la misma altura de carpetas
function modalIndex(nombre_producto, precio,id,imagen){
    Swal({
        title: '<h3 style="color:#0E9700;">Agregado al carrito!</h3>',
        html: '<table style="width:100%;">'+
                '<tr>'+
                    '<td>Producto:</td>'+
                    '<td>'+nombre_producto+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Precio:</td>'+
                    '<td>$ '+formatNumber(precio)+'</td>'+
                '</tr>'+
            '</table>'+
            '<br>'+
            '<div style="text-align:center;">'+
                '<td colspan="2"><a href="javascript:void(0)" onclick="Swal.close();"><button class="btn btn-primary">Seguir comprando</button></a><td>&nbsp;&nbsp;'+
                '<td colspan="2"><a href="/Proyectos/desayunosestilogourmet/cart.php"><button class="btn btn-warning" style="color:white;">Revisar el carrito</button></a><td>'+
                '<hr>'+
                '<a href="javascript:void(0)">Desayunos Estilo Gourmet</a>'+
            '</div>',
        imageUrl: '/Proyectos/desayunosestilogourmet/img/productos/'+imagen,
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Producto Desayuno Estilo Gourmet',
        animation: false,
        showCloseButton: true,
        showConfirmButton: false
      });
}