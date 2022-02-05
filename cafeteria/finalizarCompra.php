<?php
include_once "funciones.php";

 $idproducto = $_POST['id'];
 // $nombre = $_POST['prod'];
 $stock = $_POST['stock'];
 $cantidad = $_POST['cant'];
 // $preciounit = $_POST['preciounit'];
 $total = $_POST['total'];
 
 generarFacturaEnc();
 $factura = UltimaFactura();
 $idfac   = $factura->id;
 $res =  guardarDetalleFac($idfac,$idproducto,$cantidad,$total);
 
  if($res){
    $stockt= $stock - $cantidad;
  	UpdateStockProducto($idproducto,$stockt);

          header('location:/cafeteria/productos.php');
  	// echo "Factura guardada";
     }

