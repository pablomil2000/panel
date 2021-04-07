<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LaArboledaflix</title>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <a class="navbar-brand" href="../">
      <h3>LaArboledaFlix</h3>
    </a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">

          <?php echo "<font color=\"#34b1eb\"><h4>Sesión no iniciada</h4></font>" ?>;

          <div class="card text-white bg-primary o-hidden ">
            <div class="card-body">
              <a href="#">
                <div class="mr-5 text-light">Iniciar Sesión</div>
              </a>
            </div>
          </div>
        </li>
      </ul>

    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

      <h1 class="mb-3">Login</h1>

      <form action="../codigo/principal.php?login" method="post">
        <div class="form-row">
          <div class="col-md-12 form-group">
            Iniciar sesion:

            <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" />
          </div>

        </div>
        <div class="text-center"><button type="submit">Enviar</button></div>
      </form>

    </div>
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>
  <!-- Custom scripts for this page-->
  <script src="../js/sb-admin-datatables.min.js"></script>
  <script src="j<../s/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>