<?php include("../layout/header.php"); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Bancos</h3>

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
          <div class="col-md-12">
            <center><h1 class="page-heading">Usuario <small></small></h1></center>

            <div class="eliminarmensaje"></div>
            <button class="btn btn-default pull pull-right"  data-toggle="modal" data-target="#adddatos" id="adddatosModalBtn"><span class="glyphicon glyphicon-plus-sign"></span> Añadir</button>

            <br/><br/><br/>

            <table class="table sortable {disableSortCols: [2]}" id="manejadordatosusuario">
              <thead style="background-color: #314b75;color: white">
                <tr>
                  <th>#</th>
                  <th>Tipo Usuario</th>
                  <th>Usuario de Banco:</th>
                  <th>Usuario</th>
                  <th>Datos Personales</th>
                  <th>Correo</th>
                  <th>Telefono/Celular</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                </tr>
              </thead>

            </table>
          </div>
        </div>

        <div class="modal fade " id="adddatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-plus-sign"></span> Añadir</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="form-horizontal" action="../../config/Usuario/acciones/create.php" method="POST" id="createusuform">
                <div class="modal-body">
                  <div class="col-sm-12 mx-auto">
                    <div class="messages"></div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="" class="col-sm-5" name="perfil" id="perfil">Banco</label>
                          <div class="col-sm-10">
                            <select name="ddlbanco" id="ddlbanco" class="selectpicker form-control" data-live-search="true">
                              <option value="">Selecione</option>
                              <?php 
                              require_once('../../Modelo/Banco/m_Banco.php');
                              $m_banco= new m_Banco();
                              $output=array("data" => array());
                              $results=$m_banco->selectddl();
                              foreach ($results as $row) {?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1]; ?></option>
                              <?php } ?>       
                            </select> 
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Cédula o Ruc</label>
                          <div class="col-sm-10">
                            <input type="text" name="cedula" id="cedula" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Primer Nombre</label>
                          <div class="col-sm-10">
                            <input type="text" id="txtpnombre" name="txtpnombre" placeholder="Nombres Completos" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Segundo Nombre</label>
                          <div class="col-sm-10">
                            <input type="text" id="txtsnombre" name="txtsnombre" placeholder="Nombres Completos" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="col-sm-5">Apellido Paterno</label>
                          <div class="col-sm-10">
                            <input  type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Apellido Paterno"/>
                          </div>
                        </div>

                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Apellido Materno</label>
                          <div class="col-sm-10">
                            <input type="text" name="amaterno" id="amaterno" class="form-control" placeholder="Apellido Materno">
                          </div>
                        </div>
                      </div>
                    </div>
                      
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Dirección Domiciliaria</label>
                          <div class="col-sm-10">
                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Teléfono</label>
                          <div class="col-sm-10">
                            <input type="text" name="telefonos" id="telefonos" class="form-control" placeholder="Telefono">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Celular</label>
                          <div class="col-sm-10">
                            <input type="text" name="cell" id="cell" class="form-control" placeholder="Celular">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Correo</label>
                          <div class="col-sm-10">
                            <input type="text" id="correo" name="correo" class="form-control">
                          </div>

                        </div>


                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Perfil</label>
                          <div class="col-sm-10">
                            <select name="ddlperfil" id="ddlperfil" class="form-control">
                              <option value="">Seleccione</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">

                        <div class="form-group">
                          <label for="" class="col-sm-5">Usuario</label>
                          <div class="col-sm-10">
                            <input type="text" id="user" name="user" class="form-control" placeholder="Usuario">
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Contraseña</label>
                          <div class="col-sm-10">
                            <input type="password" id="pass" class="form-control" name="pass" placeholder="********">
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="" class="col-sm-5">Repita Contraseña</label>
                          <div class="col-sm-10"> 
                            <input type="password" id="rpass" class="form-control" name="rpass" placeholder="********">
                          </div>  
                        </div>
                      </div>
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
       <div class="modal" tabindex="-1" role="dialog" id="eliminarusuModal">
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
      <div class="modal" tabindex="-1" role="dialog" id="editarusuModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Editar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="../../config/Usuario/acciones/update.php" method="POST" id="updateusuform">
              <div class="modal-body">
               <div class="editar_messages"></div>
               <div class="form-group">
                <label for="" name="perfil" id="perfil" class="control-label col-sm-2">Rol</label>
                <div class="col-sm-10">
                  <select name="erol" id="erol" class="form-control">
                    <option value="">Selecione</option>
                    <?php 
                   /* $con=conect();
                    $sql="CALL SP_SIS02_GET(1,'cmb')";
                    $query=mysqli_query($con,$sql);
                    while ($rows=mysqli_fetch_assoc($query)) {?>
                      <option value="<?php echo $rows["SIS02_ID"]; ?>"><?php echo $rows["SIS02_DESC"]; ?></option>
                    <?php }
                    $con->close();*/
                    ?>
                  </select> 
                </div>
              </div>

              <div class="form-group">
                <label for="" class="control-label col-sm-2">Cédula o Ruc</label>
                <div class="col-sm-10">
                  <input type="text" name="ecedula" id="ecedula" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="control-label col-sm-2">Nombres</label>
                <div class="col-sm-10">
                  <input type="text" id="enombres" name="enombres" placeholder="Nombres Completos" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Apellido Paterno</label>
                <div class="col-sm-10">
                  <input  type="text" class="form-control" id="eapaterno" name="eapaterno" placeholder="Apellido Paterno"/>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label col-sm-2">Apellido Materno</label>
                <div class="col-sm-10">
                  <input type="text" name="eamaterno" id="eamaterno" class="form-control" placeholder="Apellido Materno">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="control-label col-sm-2">Dirección</label>
                <div class="col-sm-10">
                  <input type="text" name="edireccion" id="edireccion" class="form-control" placeholder="Dirección">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label col-sm-2">Teléfono</label>
                <div class="col-sm-10">
                  <input type="text" name="etelefono" id="etelefono" class="form-control" placeholder="Telefono">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label col-sm-2">Celular</label>
                <div class="col-sm-10">
                  <input type="text" name="ecell" id="ecell" class="form-control" placeholder="Celular">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="control-label col-sm-2">Fecha de Nacimiento</label>
                <div class="col-sm-10">
                  <input type="date" name="efnaci" id="efnaci" onblur="" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label col-sm-2">Correo</label>
                <div class="col-sm-10">
                  <input type="email" id="ecorreo" name="ecorreo" class="form-control">
                </div>

              </div>

              <div class="form-group">
                <label for="" class="control-label col-sm-2">Usuario</label>
                <div class="col-sm-10">
                  <input type="text" id="euser" name="euser" class="form-control" placeholder="Usuario">
                </div>
              </div>

              <div class="form-group">
                <label for="" class="control-label col-sm-2">Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" id="epass" class="form-control" name="epass" placeholder="********">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="control-label col-sm-2">Repita Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" id="repass" name="repass" placeholder="********" class="form-control">
                </div>
              </div>


              <div class="form-group">
               <label class="col-sm-2 control-label">Estado</label>
               <div class="col-sm-10">
                 <select name="eestado" id="eestado" class="form-control">
                   <option value="">Seleccione</option>
                   <option value="1">Activo</option>
                   <option value="0">Inactivo</option>
                 </select>
               </div>
             </div>
           </div>
           <div class="modal-footer editusuModalid">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Actualizar Registro</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--FIN EDITAR-->
</div>
<!-- /.box-body -->
<div class="box-footer">
  Footer
</div>
<!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<script type="text/javascript" src="../../crudjs/datosUsuario.js"></script>
<?php include("../layout/footer.php");?>