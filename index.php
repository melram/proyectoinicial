<?php include_once("verifica_login.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
 <?php include("header.php"); ?>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include("menu-vertical.php"); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
       <?php include("menu-horizontal.php"); ?>
         <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
              <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Inicio - NM Perfumerias</h1>

            <div class="btn-group" role="group" aria-label="Basic example">
             <a href="nuevo-pedido.php" class="btn btn-sm btn-primary"><i class="fas fa-file fa-sm text-white-50"></i> Nuevo Pedido</a>
            <?php if($_SESSION['user_tipo']==1){?>
             <button type="button" class="btn btn-sm btn-success" onclick="exportar_excel_inicio()"><i class="fas fa-download fa-sm text-white-50"></i> Exportar Excel</button>
            <?php } ?>
            </div>
          </div>
          <?php 
                date_default_timezone_set('America/Santiago');  
                $dateini= new DateTime();
                $dateini->modify('this week -3 days');
               //$dateini->modify('first day of this month');
                $datefin= new DateTime();
                $datefin->modify('last day of this month');
                ?>
              <div class="form-group row">
                              <div class="col-sm-3">
                                <input type="date" id="fecha_ini" class="form-control" value="<?php echo $dateini->format('Y-m-d');?>" max="<?php echo $datefin->format('Y-m-d');?>">
                              </div>
                              <div class="col-sm-3">
                                  <input type="date" id="fecha_fin" class="form-control" value="<?php echo $datefin->format('Y-m-d');?>" max="<?php echo $datefin->format('Y-m-d');?>">
                              </div> 
                          <div class="col-sm-3">
                            <select class="form-control" name="filtro_estado" id="filtro_estado">
                              <option value="temp" selected>Borrador</option>
                              <option value="pend">Pendiente</option>
                              <option value="comple">Completado</option>
                            </select>
                             </div> 
                              <div class="col-sm-1">
                             <button class="btn btn-sm btn-primary shadow-sm" onclick="consultar();"><i class="fas fa-search fa-sm text-white-50"></i></button>
                              </div>
              </div>
          <!-- Content Row -->
          <div class="row" id="card-resumen">

            
          </div>

          <!-- Content Row -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista Pedidos</h6><div id="loader"></div>
            </div>
            <div class="card-body table-responsive" id="lista-pedido">
             
            </div>
          </div>
         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <?php include("footer.php"); ?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include("modal/logout.php") ?>
  <!-- Script-->
  <?php include("script.php") ?>
  <script type="text/javascript" src="js/main.js?v1773207"></script>
</body>

</html>
