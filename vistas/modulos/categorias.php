 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar categoría
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar categoría</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar categoría</button>

        </div>


        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Categoria</th>                
                <th>Acciones</th>                
              </tr>              
            </thead>
            <tbody>

            <?php

              $item = NULL;
              $valor = NULL;
              $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

              foreach ($categorias as $key => $value) {

                echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$value["categoria"].'</td>
                    <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"> <i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"> <i class="fa fa-times"></i></button>                    
                          
                        </div>
                      </td>
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
   Modal categoria  AGREGAR
  =============================-->

  <!-- The Modal -->
<div class="modal" id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">
    <form  role="form" method="post">

      <!-- Modal Header -->
      <div class="modal-header" style="background:#605ca8;color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar categoría</h4>
      </div>




      <!-- Modal body -->
      <div class="modal-body">

        <div class="box-body">          
          <div class="form-group">
            <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
         
              <input class="form-control imput-lg" type="text" name="nuevaCategoria" id="nuevaCategoria" placeholder="Ingresar categoría" required>
              
            </div>

          </div>         

          
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary " >Guardar categoría</button>
      </div>

      <?php
      $crearCategoria = new ControladorCategorias();
      $crearCategoria -> ctrCrearCategoria();

      ?>

    



      </form>
    </div>
  </div>
</div>

<div class="modal" id="modalEditarCategoria" class="modal fade" role="dialog">

<div class="modal-dialog">
  <div class="modal-content">
  <form  role="form" method="post">

    <!-- Modal Header -->
    <div class="modal-header" style="background:#605ca8;color:white">
      
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Editar categoria</h4>
    </div>




    <!-- Modal body -->
    <div class="modal-body">

      <div class="box-body">          
        <div class="form-group">
          <div class="input-group">              
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
       
            <input class="form-control imput-lg" type="text" name="editarCategoria" id="editarCategoria" placeholder="Editar categoría" required>
            <input type="hidden" name="idCategoria" id="idCategoria" placeholder="Editar categoría" >
          </div>

        </div>         

        
      </div>
    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
      <button type="submit" class="btn btn-primary " >Editar categoría</button>
    </div>

    <?php
    $crearCategoria = new ControladorCategorias();
    $crearCategoria -> ctrEditarCategoria();

    ?>

  



    </form>
  </div>
</div>
</div>

<?php

$borrarCategoria= new ControladorCategorias();
$borrarCategoria -> ctrBorrarCategoria();



?>