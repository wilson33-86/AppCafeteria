
<?php 
include_once "funciones.php";
$categorias = obtenerCategorias();
// print_r($categorias);

include_once "encabezado.php";

$categoriaId ='';
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

//Se insertan datos
  $res =guardarProducto($nombre,$referencia,$precio,$peso,$categoria,$stock);
   if($res){

         header('location:/cafeteria/productos.php?result=2');
     }
}

 ?>
<div class="container mt-4">
    <form class="form col-md-6 col-md-offset-3" method="POST">
        <h2 class="h3">Nuevo producto</h2>
        <div class="form-group mb-2">
            <label for="nombre">Nombre</label>
            
                <input class="form-control" type="text" placeholder="Nombre" name="nombre" required>
        
        </div>
        <div class="form-group mb-2">
            <label for="referencia">Referencia</label>
            <input class="form-control" type="text" placeholder="Referencia" name="referencia" required>
                           
        </div>
        <div class="form-group mb-4">
            <label for="precio">Precio</label>
           
                <input  name="precio" class="form-control" type="number" placeholder="Precio" required>
            
        </div>
         <div class="form-group mb-4">
            <label for="peso">Peso</label>
           
                <input   name="peso" class="form-control" type="number" placeholder="Peso" required>
            
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
           
                <input  name="stock" class="form-control" type="number" placeholder="Stock" required>
            
        </div>
       
            
                <button  type="submit" class="btn btn-success">Guardar</button>
                <a href="cafeteria/productos.php" class="btn btn-warning">Cancelar</a>
            
        
    </form>
</div>

<?php include_once "pie.php" ?>