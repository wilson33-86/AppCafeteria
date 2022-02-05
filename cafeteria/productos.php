
<?php

include_once "funciones.php";
$productos = obtenerProductos();
 include_once "encabezado.php"; 
$resultado = $_GET['result'] ?? null;

if($_SERVER["REQUEST_METHOD"]==="POST"){
   $id = $_POST['id'];
 $res =  eliminarProducto($id);
  if($res){

         header('location:/cafeteria/productos.php?result=1');
     }
}
 ?>
    
 
<div class="container mt-4">
    <div class="col-12">
        <h2 class="h3 text-center">Productos</h2>

      <?php if($resultado == 1): ?>
         <div class="alert alert-success" role="alert">
        Producto Eliminado Correctamente
        </div>
         <?php elseif($resultado == 2): ?>
         <div class="alert alert-success" role="alert">
        Producto Creado Correctamente
        </div>
         <?php elseif($resultado == 3): ?>
         <div class="alert alert-success" role="alert">
        Producto Actualizado Correctamente
        </div>
      <?php endif;?>

        <a class="btn btn-success" href="cafeteria/agregar_producto.php">Nuevo&nbsp;<i class="fa fa-plus"></i></a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Fecha Creacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
           
            <?php foreach($productos as $producto):?> 
              <tr>  
              <td><?php echo $producto->id;?></td>
              <td><?php echo $producto->nombre;?></td>
              <td><?php echo $producto->referencia;?></td>
              <td><?php echo $producto->precio;?></td>
              <td><?php echo $producto->peso;?></td>
              <td><?php echo $producto->categoria;?></td>
              <td><?php echo $producto->stock;?></td>
              <td><?php echo $producto->fecha_creacion;?></td>
              <td class="d-flex justify-content-around">
            <form method="POST">
            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                <input type="submit" class="btn btn-danger" value="Eliminar">
             </form>

                <a href="cafeteria/editar_producto.php?id=<?php echo $producto->id; ?>" class="btn btn-warning">Actualizar</a>
            </td>
              </tr>
             <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
    </section>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded',()=>{
            const message = document.querySelectorAll('.alert');
            
            message.forEach(msg=>{
                
                setTimeout(() => {
                    msg.remove();
                }, 3000);
            })
        })
      

    </script>
</body>

</html>