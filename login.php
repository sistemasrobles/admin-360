<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración Planosxx - Grupo Robles & Yasikov</title>
    <link rel="shortcut icon" href="images/ico.ico">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


    <link href="assets/alertify/css/alertify.css" rel="stylesheet">


    <style type="text/css">
        
        .gradient-custom-2 {



            background: rgb(0,98,76);
            background: linear-gradient(90deg, rgba(0,98,76,1) 0%, rgba(1,135,105,1) 51%, rgba(0,201,156,1) 100%);


        }

        @media (min-width: 768px) {
                .gradient-form {
                height: 100vh !important;
                }
        }
            @media (min-width: 769px) {

            .gradient-custom-2 {

                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;

                }
            }

        input::placeholder {
          font-size: 11px; 
        }
    </style>

</head>

<body  style="background-color: #eee;">

    <div class="container">

        <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="images/logo-color.svg"
                    style="width: 125px;" alt="logo">
                  
                </div>

                <form method="POST" id="form_login">
                    <div class="my-4"><small ><strong>Ingrese sus credenciales</strong></small></div>
                  

                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control p-4"
                      placeholder="Ingrese Correo" required />
                    
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password"  name="password" class="form-control p-4" placeholder="Ingrese Password" required/>
                 
                  </div>


                  <div class="form-outline mb-4">

                   <small class="text-danger" id="errors"></small>
                 
                  </div>

                 <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn btn-success btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" value="Ingresar">
                    
                  </div>

                  

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Planos 360°</h4>

                
                <p class="small mb-0">Módulo para la administración de planos 360° de los proyectos inmobiliarios del grupo <br><a class="text-white" href="https://gruporobles.com.pe/" target="_blank" style="text-decoration: underline;">Robles & Yasikov.</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

       

    </div>

    <!-- Bootstrap core JavaScript-->


    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


     <script src="assets/alertify/alertify.js" ></script>

    <script src="js/principal.js"></script>
    <script src="js/login.js"></script>

</body>

</html>