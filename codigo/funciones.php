<?php

function login()
{
    $nombre = $_POST['usuario'];

    if ($nombre == "Administrador") {
        $_SESSION['tipo'] = "Admin";
        $_SESSION['nombre'] = "$nombre";
        echo "Session iniciada como Administrador";
    } else {
        echo "Session iniciada como usuario";
        $_SESSION['tipo'] = "Usuar";
        $_SESSION['nombre'] = "$nombre";
    }
}

function cerrar()
{
    session_destroy();
    header("Location:../");
}

function conectar(&$c)
{
    if (isset($_SESSION['tipo'])) {
        if ($_SESSION['tipo'] == "Admin") {
            $servidor = "localhost";
            $usuario = "Panel_Admin";
            $contra = "";
        } else {
            $servidor = "localhost";
            $usuario = "Panel_Usuario";
            $contra = "";
        }
        $c = @mysqli_connect($servidor, $usuario, $contra) or die("No es posible conectar");
    } else {
        echo "No es posible conectar";
        exit();
    }
}

function Todasbd()
{
    conectar($c);
    listarbd($c, $vec);
    mostrarbd($vec);
}

function listarbd($c, &$vec)
{
    if (isset($c)) {
        $operacion = "SHOW DATABASES";
        $vec = mysqli_query($c, $operacion);
    }
}

function mostrarbd($vec)
{
    echo "<h1>Existen" . mysqli_num_rows($vec) . " Bases de datos<br></h1>";
    foreach ($vec as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo "$value2<br>";
        }
    }
}

function listabd($vec)
{
    foreach ($vec as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo '<option value="' . $value2 . '">' . $value2 . ' </option>';
        }
    }
}

function selecbd()
{
    $bd = $_POST['base'];
    setcookie("bd", $bd, time() + 3600, "/");
}

function formuSelect($get)
{

    conectar($c);
    listarbd($c, $vec);

?>

    <div class="card text-white bg-primary o-hidden ">
        <div class="card-body">
            <form action="principal.php?<?php echo "$get" ?>" method="post">
                <select name="base">
                    <option value="">Seleccione:</option>
                    <?php listabd($vec); ?>
                </select>
                <input type="submit" value="selecionar bd">
            </form>
        </div>
    </div>
<?php

}

function tablasbd()
{
    conectar($c);
    $bd = $_POST['base'];
    mysqli_select_db($c, $bd);

    $p = "SHOW TABLES";
    if ($vec = mysqli_query($c, $p)) {
        echo "<h1>Existen" . mysqli_num_rows($vec) . " Tablas<br></h1>";
        listabd($vec);
    }
}

function menubd()
{
    conectar($c);
    listarbd($c, $vec);
    mostrarbd($vec);
}

function listarcolumna()
{
    conectar($c);

    $bd = $_POST['base'];
    mysqli_select_db($c, $bd);

    listado($c, $vec, $bd);
    
    // mostrartabla($vec);
}

function listado($c, &$vec, $bd)
{
    if (isset($c)) {
        $operacion = "SHOW COLUMNS FROM $bd";
        $vec = mysqli_query($c, $operacion);
    }
}

function mostrartabla($vec)
{
    foreach ($vec as $key => $value) {
        foreach ($value as $key2 => $value2) {
            echo "$value2<br>";
        }
    }
}
