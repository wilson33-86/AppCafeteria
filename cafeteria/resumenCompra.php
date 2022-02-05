<?php
include_once "funciones.php";

 include_once "encabezado.php"; 

 $id = $_POST['id'];
 $cantidad = $_POST['cantidad'];
 $producto = obtenerProductoPorId($id);
 $total = $cantidad * $producto->precio;
 $stock = $producto->stock;
 if(!$stock >0){
  header('location:/cafeteria/catalogo.php?result=1');
 }
?>


<div class="container mt-4">
	<h3>Resumen de compra</h3>

	 <form class="col-md-6 col-md-offset-3" method="POST" action="cafeteria/finalizarCompra.php">
	 <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	 <input type="hidden" name="stock" value="<?php echo $producto->stock; ?>">
	<label>Producto</label><input class="form-control" name ="prod"value="<?php echo $producto->nombre; ?>" readonly>
	<label>Cantidad</label><input class="form-control" name="cant" value="<?php echo $cantidad?>"readonly>
	<label>Precio Unitario</label><input class="form-control" name="preciounit" value=" <?php echo '$'.$producto->precio?>"readonly>
	<label>Total</label><input class="form-control" name="total" value=" <?php echo $total; ?>"readonly>
	 <button  type="submit" class="btn btn-primary mt-4">Finalizar Compra</button>
	  <a href="cafeteria/catalogo.php" class="btn btn-light mt-4">Cancelar</a>
    </form>

</div>


	 
