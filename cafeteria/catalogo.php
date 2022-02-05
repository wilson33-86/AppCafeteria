
<?php
include_once "funciones.php";
$productos = obtenerProductos();
 include_once "encabezado.php"; 
// $resultado = $_GET['result'] ?? null;

$resultado = $_GET['result'] ?? null;
 ?>    
    <?php if($resultado == 1): ?>
         <div class="alert alert-success" role="alert">
        No hay stock del producto que seleccionaste
        </div>
   <?php endif;?>

 <div class="row mt-4 container offset-md-1" > 
     <?php foreach($productos as $producto):?> 
<div class="card text-center col-md-3" style="margin: 40px;">
<!--  <div class="card-header bg-light ">
   Producto
    
 </div> -->
 <!-- <img [src]="game.imageUrl"> -->
 <div class="card-body">
     <span><?php echo $producto->nombre;?></span>
   <p> <?php echo "<span>$</span>".$producto->precio;?></p>
   <form class="form" method="POST" action="cafeteria/resumenCompra.php">
            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
            <div class="d-flex inline-flex">
            <label>Cantidad: </label>
            <input type="number" name="cantidad"  class="form-control  mb-4" min="1">
           </div>
            <input type="submit" class="btn btn-primary" value="comprar">
             </form>
</div>
</div>
 <?php endforeach; ?>
</div>


<?php include_once "pie.php" ?> 