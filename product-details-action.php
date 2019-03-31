<?php
session_start();
//var_dump($_POST); 
$total = 0;

// echo "<pre>";
// var_dump($_POST);
// exit;
$conn = mysqli_connect("localhost", "root","", "dev_desayunosgourmet");

if(isset($_SESSION['carrito_compras'])){
    if(isset($_POST['id_producto'])){
            $arreglo=$_SESSION['carrito_compras'];
            $encontro=false;
            $numero=0;
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']==$_POST['id_producto']){
                    $encontro=true;
                    $numero=$i;
                }
            }
            if($encontro==true){
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+$_POST['quantity'];
                $_SESSION['carrito_compras']=$arreglo;
            }else{
                $nombre="";
                $precio=0;
                $imagen="";
                $re=mysqli_query($conn,"select * from producto where id=".$_POST['id_producto']);
                while ($f=mysqli_fetch_array($re)) {
                    $nombre=$f['nombre'];
                    $precio=$f['precio'];
                    $imagen=$f['imagen'];
                    $stock=$f['stock'];
                    }
                    $datosNuevos=array('Id'=>$_POST['id_producto'],
                                    'Nombre'=>$nombre,
                                    'Precio'=>$precio,
                                    'Imagen'=>$imagen,
                                    'Stock'=>$stock,
                                    'Cantidad'=>$_POST['quantity']);

                    array_push($arreglo, $datosNuevos);
                    $_SESSION['carrito_compras']=$arreglo;

                }
    }
}else{
    if(isset($_POST['id_producto'])){
        $nombre="";
        $precio=0;
        $imagen="";
        $QUERY = "select * from producto where id=".$_POST['id_producto']."";
        $re=mysqli_query($conn,$QUERY);
        while ($f=mysqli_fetch_array($re)) {
            $nombre=$f['nombre'];
            $precio=$f['precio'];
            $imagen=$f['imagen'];
            $stock=$f['stock'];
        }
        $arreglo[]=array('Id'=>$_POST['id_producto'],
                        'Nombre'=>$nombre,
                        'Precio'=>$precio,
                        'Imagen'=>$imagen,
                        'Stock'=>$stock,
                        'Cantidad'=>$_POST['quantity']);
        $_SESSION['carrito_compras']=$arreglo;
    }
}

header("location:cart.php");
?>