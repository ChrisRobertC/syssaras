<?php include("../layout/header.php"); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Menu
      <small><!--it all starts here--></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="../../View/Welcome/"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Seguridad</a></li>
      <li class="active">Menu</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><!--Bancos--></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        	<div class="row">
           <div class="col-md-12 col-lg-12 col-xs-12 col-md-12">
            <center><h1 class="page-heading">Menu <small></small></h1></center>

            <div class="eliminarmensaje"></div>
            <button class="btn btn-default pull pull-right"  data-toggle="modal" data-target="#adddatos" id="adddatosModalBtn"><span class="glyphicon glyphicon-plus-sign"></span> Añadir</button>

            <br/><br/><br/>

            <table class="table" id="manejadordatosmenu">
             <thead style="background-color: #314b75;color: white">
              <tr>
               <th>#</th>               			  
               <th>Descripción</th>
               <th>Url</th>
               <th>Icono</th>						  
               <th>Orden Menu</th>
               <th>Estado</th>						  
               <th>Opciones</th>
             </tr>
           </thead>

         </table>
       </div>
     </div>	
   </div>

   <!--Modal create-->
   <div class="modal fade" id="adddatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-plus-sign"></span> Añadir</h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="../../Controlador/s_Menu/c_MenuCreate.php" method="POST" id="createmenuform">
          <div class="modal-body">

           <div class="messages"></div>

           <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Descripción:</label>
            <div class="col-sm-10">
              <input  class="form-control" id="txtdescripcion" name="txtdescripcion" placeholder="Descripción"></input>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Url:</label>
            <div class="col-sm-10">
              <input  class="form-control" id="txturl" name="txturl" placeholder="Url"></input>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-sm-2">Icono</label>
            <div class="col-sm-10">
              <input type="text" id="txticono" name="txticono" placeholder="Icono" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-sm-2">Order</label>
            <div class="col-sm-10">
              <input type="text" id="txtorden" name="txtorden" placeholder="Orden Menu" class="form-control">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>  

        </div>
      </form>
    </div>
  </div>
</div>

<!--Elimnar modal-->
<div class="modal" tabindex="-1" role="dialog" id="eliminarmenuModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="glyphicon glyphicon-trash">Eliminar</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Estas Seguro??.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-secondary"  id="eliminarbtn">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!--FINremover-->

<!--EDITAR-->
<div class="modal" tabindex="-1" role="dialog" id="editarmenuModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="../../Controlador/s_Menu/c_MenuUpdate.php" method="POST" id="updatemenuform">
        <div class="modal-body">
         <div class="editar_messages"></div>


         <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Descripción:</label>
            <div class="col-sm-10">
              <input class="form-control" id="txtedescripcion" name="txtedescripcion" placeholder="Descripción">
               </input>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Url:</label>
            <div class="col-sm-10">
              <input class="form-control" id="txteurl" name="txteurl" placeholder="Url">
               </input>
            </div>
          </div>

      <div class="form-group">
        <label for="" class="control-label col-sm-2">Icono:</label>
        <div class="col-sm-10">
          <input type="text" id="txteicono" name="txteicono" class="form-control" placeholder="Icono">
        </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label col-sm-2">Orden Menu:</label>
        <div class="col-sm-10">
          <input type="text" id="txteorden" name="txteorden" class="form-control" placeholder="Orden Menu">
        </div>
      </div> 

      <div class="form-group">
       <label class="col-sm-2 control-label">Estado</label>
       <div class="col-sm-10">
         <select name="ddleestado" id="ddleestado" class="form-control">
           <option value="">Seleccione</option>
           <option value="1">Activo</option>
           <option value="0">Inactivo</option>
         </select>
       </div>
     </div>
   </div>
   <div class="modal-footer editmenuModalid">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary" >Actualizar Registro</button>
  </div>
</form>
</div>
</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <!--Footer-->
</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<script type="text/javascript" src="../../crudjs/datosmenu.js"></script>

<?php include("../layout/footer.php");?>
