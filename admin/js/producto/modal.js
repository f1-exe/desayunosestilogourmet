function modal(mensaje){
    Swal({
        title: 'Mensaje',
        html: mensaje,
        imageUrl: 'images/avatars/0.jpg',
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
        animation: false
      });
}

function modalEliminar(id){
  Swal.fire({
    title: '¿Estás seguro que deseas eliminar este producto?',
    text: "¡Atención, una vez eliminado el producto, no se podrá recuperar!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, deseo eliminar el producto',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        '¡Eliminado!',
        'El producto se ha eliminado correctamente',
        'success'
      )
    }
  });
}

function modalEliminar2(id){
  const swalWithBootstrapButtons = Swal.mixin({
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false,
  })
  
  swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      swalWithBootstrapButtons.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    } else if (
      // Read more about handling dismissals
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelled',
        'Your imaginary file is safe :)',
        'error'
      )
    }
  });
}