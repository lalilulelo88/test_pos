 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Productos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>

        </div>


        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Imagen</th>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
                             
              </tr>              
            </thead>
            <tbody>

            <?php

            $item = NULL;
            $valor = NULL;

            $productos = ControladorProductos::ctrMostrarProductos($item,$valor);

            foreach($productos as $key => $value ){
              echo'<tr>
              <td>'.($key+1).'</td>
              <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>'.$value["codigo"].'</td>
              <td>'.$value["descripcion"].'</td>';

              $item = "id";

              $valor = $value["id_categoria"];

              $categoria = ControladorCategorias::ctrMostrarCategorias($item,$valor);              
              
              echo '<td>'.$categoria["categoria"].'</td>
              <td>'.$value["stock"].'</td>
              <td>'.$value["precio_compra"].'</td>
              <td>'.$value["precio_venta"].'</td>
              <td>'.$value["fecha"].'</td>
              <td><div class="btn-group">
                    <button class="btn btn-warning btnEditarProducto" idProducto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarProducto"> <i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btnEliminarProducto" idProducto="'.$value["id"].'" > <i class="fa fa-times"></i></button>                    
                    
                  </div></td>
            </tr>';
            }

            ?>


            

           

                                    
              
              
            </tbody>

          </table>

        </div>
    
        
      </div>
      

    </section>
  
  </div>


  <!--======================
   Modal USUARIO  AGREGAR
  =============================-->

  <!-- The Modal -->
<div class="modal" id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">
    <form  role="form" method="post" enctype="multipart/form-data">

      <!-- Modal Header -->
      <div class="modal-header" style="background:#605ca8;color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar producto</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="box-body">

        <div class="form-group">
            <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
         
              <select class="form-control imput-lg" name="nuevaCategoria" id="nuevaCategoria" required>
                <option value="">Seleccionar categoria</option>

                <?php

                    $item = NULL;

                    $valor = NULL;

                    $categoria = ControladorCategorias::ctrMostrarCategorias($item,$valor);

                    foreach ($categoria as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                    }

                ?>
                
                        
                
              </select>
              
            </div>

          </div>

          <div class="form-group">
            <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-code"></i></span>
         
              <input class="form-control imput-lg" type="text" name="nuevoCodigo" placeholder="Ingresar codigo" required>
              
            </div>

          </div>

          <div class="form-group">
            <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
         
              <input class="form-control imput-lg" type="text" name="nuevaDescripcion"  placeholder="Ingresar descripcion" required>
              
            </div>

          </div>

         

          <div class="form-group">
            <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-check"></i></span>
         
              <input class="form-control imput-lg" type="number" name="nuevoStock" min="0" placeholder="Ingresar stock" required>
              
            </div>

          </div>

          <div class="form-group row">

            <div class="col-xs-6">
              <div class="input-group">              
                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
          
                <input class="form-control imput-lg" type="number" name="nuevoPrecioCompra" min="0" placeholder="Ingresar precio de compra" required>
                
              </div>
            </div>

            <div class="col-xs-6">
              <div class="input-group">              
                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
          
                <input class="form-control imput-lg" type="number" name="nuevoPrecioVenta" min="0" placeholder="Ingresar precio de venta" required>
                
              </div>



              <br>

                <!-- CHECK PORCENTAJE -->

                <div class="col-xs-6" style="padding:0">
                  <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal-red porcentaje" checked>
                    Utilizar procentaje
                  
                  </label>      
                  </div>
                </div>

                <div class="col-xs-6" style="padding:0">
                  <div class="input-group">
                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" require>
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  </div>

                </div>
            </div>
          </div>

          




          <div class="form-group">
            
            <div class="panel text-uppercase">Subir Imagen</div>

            <input type="file" class="nuevaImagen" name="nuevaImagen">
            <p class="help-block">Peso máximo de la imagen 2 MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>     
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary " >Guardar producto</button>
      </div>

     



      </form>
    </div>
  </div>
</div>

 <!--======================
   Modal USUARIO  EDITAR
  =============================-->

 