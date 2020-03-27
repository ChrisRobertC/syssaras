  <?php include("../layout/header.php") ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Empezar 
        <small>Evaluación</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Banco</a></li>
        <li class="active">Empezar Evaluación</li>
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
            <div class="container">
              <div class="row "><!--justify-content-center align-items-center minh-100-->
                <div class="col-md-12 col-sm-12">

                  <div class="col-lg-5">
                    <p><b>Datos de Busqueda</b></p>
                    <!--<img src="img/logoHead.png" class="">-->

                    <form method="POST" id="frminicio" action="">
                      <div class="form-group">
                        <label for="lblciiu">Ruc:</label>
                        <div class="row">
                          <div class="col-sm-6">
                            <input type="number" class="form-control" id="txtciiu" name="txtciiu" placeholder="Ingrese Ruc" pattern="[0-9]+" title="Solo se permiten numeros" maxlength="13">

                            <small id="smllciiu" class="form-text text-muted">Ingrese Ruc</small>
                          </div>                          
                          <div class="col-sm-6">
                            <button class="btn btn-primary" type="button" name="btnbuscar" id="btnbuscar"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>

                      </div>
                      <div class="col-sm-6" id="rptcontinuar">
                            <div class="form-group">
                              <label for="">Desea Continuar aunque tome riesgos?:</label>
                              <div class="">
                            <input type="checkbox" id="chkcontinuar" name="chkcontinuar" onclick="aceptar()" >SI
                          </div>
                            </div>
                          </div>
                      <div class="row">
                       <div class="col-sm-8">
                        <div class="form-group">
                          <label for="lblmonto">Monto</label>
                          <input type="number" class="form-control" id="txtmonto" name="txtmonto" placeholder="Monto de Inicio" pattern="[0-9]+" title="Solo se permiten numeros">
                          <small id="smllciiu" class="form-text text-muted">Ingrese Monto</small>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label class="">Certificación Sostenible</label>
                          <div class="">
                            <input type="checkbox" id="rbcert" name="rbcert" >SI
                          </div>
                        </div>  
                      </div>  
                    </div>

                    <div class="row">
                     <div class="col-sm-8">
                       <center>
                        <button type="button" name="btnenviar" id="btnenviar" class="btn btn-primary">Consultar</button>
                        <button type="button" name="btncancelar" id="btncancelar" class="btn btn-secondary">Cancelar</button>
                      </center>
                    </div>
                  </div>


                </form>


              </div>
              <div class="col-lg-7">
                <p><b>Resultados</b></p>
                <div class="row"><div id="datosp"></div></div>
                <div class="row"><div id="datoscon1"></div></div>
                <div class="row"><div id="datoscon2"></div></div>
              </div>


            </div>
          </div>
        </div>

        <!--Venta modal-->
        <div class="modal fade" tabindex="-1" role="dialog" id="preguntasModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Preguntas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="form-horizontal" action="" method="POST" id="frmpreguntas">
                <div class="modal-body">            
                  <font color="red">
                    <p>Macar el casillero en caso de que la respuesta sea afirmativa/caso contrario colocar "Continuar"</p>
                    <p></p>
                  </font>
                  <div class="editar_messages"></div>
                  <div id="datospreguntas"></div>           

                </div>
                <div class="modal-footer editcatesecModalid">
                  <!--<button type="button" id="btncerrar" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
                  <button type="button" id="btncontinuar" name="btnregistro" class="btn btn-primary" >Continuar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </body>
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
<script type="text/javascript" src=../../crudjs/datosevaluar.js></script>
<!-- /.content-wrapper -->
<?php include("../layout/footer.php")
?>