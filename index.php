<?php 

session_start();

if(!isset($_SESSION['user'])){


header('Location: login');


}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración Planos - Grupo Robles & Yasikov</title>
    <link rel="shortcut icon" href="images/ico.ico">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

   <link href="assets/select2/dist/css/select2.min.css" rel="stylesheet">

   <link href="assets/alertify/css/alertify.css" rel="stylesheet">
     <link href="css/principal.css" rel="stylesheet">


    <style>
        .dataTables_filter{

   
   display: none;
}


.dataTables_length {
      
   
   display: none;

}


.pagination{

    float: right !important;
}

.alertify-notifier .ajs-message {
  background: rgba(255, 255, 255, 0.95);
  color: #000;
  text-align: center;
  border: solid 1px #ddd;
  border-radius: 2px;
}
.alertify-notifier .ajs-message.ajs-success {
  color: #fff;
  background: rgba(91, 189, 114, 0.95);
  text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.5);
}
.alertify-notifier .ajs-message.ajs-error {
  color: #fff;
  background: rgba(217, 92, 92, 0.95);
  text-shadow: -1px -1px 0 rgba(0, 0, 0, 0.5);
}
.alertify-notifier .ajs-message.ajs-warning {
  background: rgba(252, 248, 215, 0.95);
  border-color: #999;
}
    </style>

</head>

<body id="page-top" class="contenedor">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index" style="margin:10px 0px">
                <div class="sidebar-brand-icon ">
                      <img src="images/white-logo.svg"
                    style="width: 90px " alt="logo" class="" > 
                </div>
                
            </a>

         

           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-landmark "></i>
                    <span>Planos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="index">Planos 360°</a>
                        
                    </div>
                </div>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider">

           

          

          

          

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                   
                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                     

                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user']['name'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="management/destroy.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Planos 360°</h1>
                     <p class="mb-4">Módulo para la administración de planos 360° de los proyectos inmobiliarios del grupo
                    <a target="_blank" href="https://gruporobles.com.pe/">Robles & Yasikov.</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <div class="row">
                                
                                <h6 class="col-lg-5 m-0 font-weight-bold text-primary" >Proyecto : <span id="project-text"></span></h6>


                                <div class="col-lg-3">
                                      <a class="btn btn-success" id="btn-mapa-web" target="_blank"href="https://recorridos.gruporobles.com.pe/la-retama/"><i class="fas fa-map-marker-alt mr-2"></i>Ver mapa </a>
                                    </div>

                                <div class="col-lg-4">
                                    <select class="form-control js-example-basic-single" id="project-select">
                                        <option value="la-retama" selected data-web="https://recorridos.gruporobles.com.pe/la-retama/">La Retama</option>
                                        <option value="valle-orquidea" data-web="https://recorridos.gruporobles.com.pe/valle-orquidea/">Valle Orquidea</option>
                                        <option value="el-bosque-del-rey" data-web="https://recorridos.gruporobles.com.pe/el-bosque-del-rey/">El Bosque del Rey</option>
                                        
                                        <option value="fundo-valentina" data-web="https://recorridos.gruporobles.com.pe/fundo-valentina/">Fundo Valentina</option>
                                        
                                        <option value="el-arco-dorado" data-web="https://recorridos.gruporobles.com.pe/el-arco-dorado/">El Arco Dorado</option>
                                        <option value="bella-primavera" data-web="https://recorridos.gruporobles.com.pe/bella-primavera/">Bella Primavera</option>


                                        <option value="el-golf-de-poseidon" data-web="https://recorridos.gruporobles.com.pe/el-golf-de-poseidon/">El Golf de Poseidon</option>
                                    </select>
                                </div>

                            </div>
                            
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive contenedor">

                                 <div class="p-1 mt-2 mb-2 d-none">
                                    <input type="text" id="buscador" name="" class="form-control  btn-round" placeholder="Ingrese para buscar..." autocomplete="off">
                                    </div>
                    
                                    <input type="hidden" name="" id="id-lote" value="0">

                                <table class="table table-bordered" id="table-360" width="100%" cellspacing="0">
                                    <thead >
                                       <tr>
                                            <th style="width:20%">Proyecto</th>
                                            <th style="width:15%">Etapa</th>
                                            <th style="width:15%">Manzana</th>
                                            <th style="width:15%">Lote</th>
                                            <th style="width:15%">Área</th>
                                            <th style="width:15%">Estado</th>
                                            <th style="width:5%"><i class="fas fa-edit"></i></th>
                                           
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       
                                       
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Robles & Yasikov 2023</span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar Actualización</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p id="msj-lote"></p>

                    <label>Estado : </label>
                    <select class="form-control" id="select-modal-state">

                        <option value="DISPONIBLE">
                            Disponible
                        </option>
                        <option value="VENDIDO">
                            Vendido
                        </option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" id="confirmar-update">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

   
     <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <script src="assets/uiblock/jquery.blockUI.js"></script>
    <script src="assets/select2/dist/js/select2.min.js"></script>


   <script src="assets/alertify/alertify.js" ></script>


   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="js/principal.js"></script>

    <script src="js/planos.js?v=123"></script>

</body>

</html>