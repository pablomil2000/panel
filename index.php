<?php
session_start();
include("codigo/funciones.php");
?>
<!DOCTYPE html0>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LaArboledaflix</title>

  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <a class="navbar-brand" href="index.php">
      <h3>LaArboledaFlix</h3>
    </a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">

          <?php
          if (!isset($_SESSION['tipo'])) {
            echo "<font color=\"#34b1eb\"><h4>Sesión no iniciada</h4></font>"
          ?>
            <div class="card text-white bg-primary o-hidden ">
              <div class="card-body">
                <a href="formularios/formulogin.php">
                  <div class="mr-5 text-light">Iniciar Sesión</div>
                </a>
              </div>
            </div>
            <?php
          } else {

            echo "<font color=\"#34b1eb\"><h4>Hola " . $_SESSION['nombre'] . "</h4></font>";


            formuSelect2("base");

            if (isset($_COOKIE['bd'])) {
            ?>
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-database"></i>

                <span class="nav-link-text">Consultas</span>
              </a>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                  <a href="codigo/principal.php?Todasbd">Todas las Bases de datos</a>
                </li>
                <li>
                  <a href="codigo/principal.php?tablas">Tablas de Bases de datos</a>
                </li>
                <li>
                  <a href="codigo/principal.php?menubd">Columnas de Tablas</a>
                </li>
              </ul>
              <?php
              if ($_SESSION['tipo'] == "Admin") {
              ?>
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                  <i class="fa fa-fw fa-database"></i>
                  <span class="nav-link-text">Administración</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents2">
                  <li>
                    <a href="codigo/principal.php?FCBD">Nueva base de datos</a>
                  </li>
                  <li>
                    <a href="codigo/principal.php?DBD">Borar Base de datos</a>
                  </li>
                  <li>
                    <a href="codigo/principal.php?Formunuevatabla">Nueva tabla</a>
                  </li>
                  <li>
                    <a href="#">Borrar tabla</a>
                  </li>
                </ul>
              <?php
              }
              ?>
            <?php
            }

            ?>


            <div class="card text-white bg-primary o-hidden ">
              <div class="card-body">
                <a href="codigo/principal.php?cerrar">
                  <div class="mr-5 text-light">Cerrar Sesion</div>
                </a>
              </div>
            </div>

          <?php
          }
          ?>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Empieza las card-->
      <div class="row">
        <img class="img-fluid mb-5 d-block mx-auto" src="imagenes/index.jpg" alt="">
      </div>
      <!-- /.content-wrapper-->
      <footer class="sticky-footer">
        <div class="container">
          <div class="text-center">
            <small>Copyright © Your Website 2020</small>
          </div>
        </div>
      </footer>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Custom scripts for this page-->
      <script src="js/sb-admin-datatables.min.js"></script>
      <script src="js/sb-admin-charts.min.js"></script>
    </div>
</body>

</html>