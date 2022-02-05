
<?php

require 'config/database.php';



function actualizarProducto($id,$nombre,$referencia,$precio,$peso,$categoria,$stock)
{
    $bd = conectarDB();
    $sentencia = $bd->prepare("UPDATE productos SET nombre = ?, referencia = ?,precio = ?,peso = ?,categoria = ?,stock= ? WHERE id = ?");
    return $sentencia->execute([$nombre, $referencia, $precio,$peso,$categoria,$stock, $id]);
}

function UpdateStockProducto($id,$stock)
{
    $bd = conectarDB();
    $sentencia = $bd->prepare("UPDATE productos SET stock= ? WHERE id = ?");
    return $sentencia->execute([$stock, $id]);
}

function obtenerProductoPorId($id)
{
    $bd = conectarDB();
    $sentencia = $bd->prepare("SELECT id, nombre, referencia, precio, peso, categoria, stock,fecha_creacion FROM productos WHERE id = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchObject();
}

function obtenerProductos()
{
    $bd = conectarDB();
    $sentencia = $bd->query("SELECT id, nombre, referencia, precio, peso, categoria, stock,fecha_creacion FROM productos");
    return $sentencia->fetchAll();
}


function obtenerCategorias()
{
    $bd = conectarDB();
    $sentencia = $bd->query("SELECT * from categoria");
    return $sentencia->fetchAll();
}
function eliminarProducto($id)
{
    $bd = conectarDB();
    $sentencia = $bd->prepare("DELETE FROM productos WHERE id = ?");
    return $sentencia->execute([$id]);
}

function guardarProducto($nombre,$referencia,$precio,$peso,$categoria,$stock )
{
    $bd = conectarDB();
    $sentencia = $bd->prepare("INSERT INTO productos(nombre, referencia, precio,peso,categoria,stock) VALUES(?, ?, ?,?,?,?)");
    return $sentencia->execute([$nombre, $referencia, $precio,$peso,$categoria,$stock]);
}


function generarFacturaEnc()
{
    $bd = conectarDB();
    $mifecha = date('Y-m-d H:i:s');
    $sentencia = $bd->prepare("INSERT INTO factura(fecha) VALUES(?)");
    $sentencia->execute([$mifecha]);
   
  
    

}

function UltimaFactura(){
    $bd = conectarDB();
    $sentencia = $bd->query("SELECT * from factura order by id desc limit 1");
    return $sentencia->fetchObject();
}

function guardarDetalleFac($idfac,$idproducto,$cantidad,$total){

    $bd = conectarDB();
    $sentencia = $bd->prepare("INSERT INTO facturadetalle(idfactura, idproducto,cantidad,precio) VALUES(?,?,?,?)");
    return $sentencia->execute([$idfac,$idproducto,$cantidad,$total]);
}
