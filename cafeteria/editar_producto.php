
<?php 
include_once "funciones.php";
$categorias = obtenerCategorias();
// print_r($categorias);
$id = $_GET['id'];
 $id = filter_var($id, FILTER_VALIDATE_INT);
 if(!$id){
   header('Location: cafeteria/agregar_producto.php');
 }

$producto = obtenerProductoPorId($id);
// print_r($producto);

include_once "encabezado.php";

$categoriaId = $producto->categoria;
 if($_SERVER["REQUEST_METHOD"]==="POST"){

    // echo'<pre>';
    // var_dump($_POST);
    // echo'</pre>';

  
  $nombre = $_POST['nombre'];
  $referencia = $_POST['referencia'];
  $precio = $_POST['precio'];
  $peso = $_POST['peso'];
  $categoria = $_POST['categoria'];
  $stock = $_POST['stock'];

//Se Actualizan los datos
 $res =  actualizarProducto($id,$nombre,$referencia,$precio,$peso,$categoria,$stock);
 if($res){

         header('location:/cafeteria/productos.php?result=3');
     }
}

 ?>
<div class="container mt-4">
    <form class="form col-md-6 col-md-offset-3" method="POST">
        <h2 class="h3">Actualizar producto</h2>
        <div class="form-group mb-2">
            <label for="nombre">Nombre</label>
            
                <input class="form-control" type="text" placeholder="Nombre" name="nombre" value="<?php echo $producto->nombre; ?>" required>
        
        </div>
        <div class="form-group mb-2">
            <label for="referencia">Referencia</label>
            <input class="form-control" type="text" placeholder="Referencia" name="referencia" value="<?php echo $producto->referencia; ?>" required>
                           
        </div>
        <div class="form-group mb-4">
            <label for="precio">Precio</label>
           
                <input  name="precio" class="form-control" type="number" placeholder="Precio" value="<?php echo $producto->precio; ?>" required>
            
        </div>
         <div class="form-group mb-4">
            <label for="peso">Peso</label>
           
                <input   name="peso" class="form-control" type="number" placeholder="Peso" value="<?php echo $producto->peso; ?>" required>
            
        </div>
         <div class="form-group mb-4">
             <label for="categoria">Categoria</label>
            <select name="categoria" class="form-select">
              <option value="">--Seleccione--</option>
               <?php foreach($categorias as $categoria):?>
              <option <?php echo $categoriaId === $categoria->id ?'selected':'';?> value="<?php echo $categoria->id?>"><?php echo $categoria->nombre?></option>

              <?php endforeach;?>

   
            </select>          
           
                           
        </div>
         <div class="form-group mb-4">
            <label for="stock">Stock</label>
           
                <input  name="stock" class="form-control" type="number" placeholder="Stock" value="<?php echo $producto->stock; ?>" required>
            
        </div>
       
            
                <button  type="submit" class="btn btn-success">Guardar</button>
                <a href="cafeteria/productos.php" class="btn btn-warning">Volver</a>
            
        
    </form>
</div>

<?php include_once "pie.php" ?>