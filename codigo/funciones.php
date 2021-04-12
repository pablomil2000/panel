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
    header("Location:../");
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

function formuSelectprincipal($get)
{

    conectar($c);
    listarbd($c, $vec);

?>

    <div class="card text-white bg-primary o-hidden ">
        <div class="card-body">
            <form action="../codigo/principal.php?<?php echo $get ?>" method="post">
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

function formuSelectTabla($get)
{

    conectar($c);
    listarTabla($c, $vec);

?>

    <div class="card text-white bg-primary o-hidden ">
        <div class="card-body">
            <form action="principal.php?<?php echo "$get" ?>" method="post">
                <select name="tabla">
                    <option value="">Seleccione:</option>
                    <?php listabd($vec); ?>
                </select>
                <input type="submit" value="selecionar bd">
            </form>
        </div>
    </div>
<?php

}

function listarTabla($c, &$vec)
{
    $bd = $_COOKIE['bd'];
    mysqli_select_db($c, $bd);
    $p = "SHOW TABLES";
    $vec = mysqli_query($c, $p);
}

function formuSelect2($get)
{

    conectar($c);
    listarbd($c, $vec);

?>

    <div class="card text-white bg-primary o-hidden ">
        <div class="card-body">
            <form action="codigo/principal.php?<?php echo "$get" ?>" method="post">
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
    $bd = $_COOKIE['bd'];
    mysqli_select_db($c, $bd);

    $p = "SHOW TABLES";
    if ($vec = mysqli_query($c, $p)) {
        echo "<h1>Existen" . mysqli_num_rows($vec) . " Tablas<br></h1>";
        listabd($vec);
    }
}


function listarcolumna()
{
    conectar($c);

    $bd = $_COOKIE['bd'];
    mysqli_select_db($c, $bd);

    listado($c, $vec, $bd);
}

function listado($c, &$vec, $bd)
{
    if (isset($c)) {
        formuSelectTabla("campo");
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

function campos()
{
    conectar($c);
    $bd = $_COOKIE['bd'];
    mysqli_select_db($c, $bd);
    $tabla = $_POST['tabla'];
    $p = "SHOW COLUMNS FROM $tabla";
    $vec = mysqli_query($c, $p);
    foreach ($vec as $key => $value) {
        foreach ($value as $key2 => $value2) {
            if ($key2 == "Field") {
                echo "$value2<br>";
            }
        }
    }
}

function FCBD()
{
?>
    <form action="principal.php?CBD" method="post">
        Nombre de la base de datos:
        <input type="text" name="nombre" placeholder="Nombre base de datos">
        <input type="submit" value="crear">
    </form>
<?php
    Todasbd();
}

function CBD()
{
    $nombre = $_POST['nombre'];

    conectar($c);
    $p = "CREATE DATABASE $nombre";

    if (mysqli_query($c, $p)) {
        echo "Base de datos creada";
    } else {
        echo "Error al crear la base de datos";
    }
}

function DBD()
{
    $bd = $_COOKIE['bd'];

    conectar($c);

    $p = "DROP DATABASE $bd";

    if (mysqli_query($c, $p)) {
        echo "Base de datos Eliminada";
    } else {
        echo "Error al eliminar la base de datos";
    }
}

function Formunuevatabla()
{
?>
    <form action="principal.php?nuevaT" method="post">
        Nombre de la tabla: <input type="text" name="tabla"><br><br>
        Campo de la tabla: <input type="text" name="campo"><br><br>
        Tipo de dato: <select name="tipo">
            <option>TinyInt</option>
            <option>Bit</option>
            <option>SmallInt</option>
            <option>MediumInt</option>
            <option>Integer</option>
            <option>BigInt</option>
            <option>Float</option>
            <option>Double</option>
            <option>Decimal</option>
            <option>DateTime</option>
            <option>TimeStamp</option>
            <option>Time</option>
            <option>Year</option>
            <option>Char</option>
            <option>VarChar</option>
            <option>TinyText </option>
            <option>Text</option>
            <option>MediumText</option>
            <option>LongText</option>
            <option>Enum</option>
        </select>
        <input type="submit" value="Crear">
    </form>
<?php
}

function nuevaT()
{
    $bd = $_COOKIE['bd'];
    conectar($c);

    mysqli_select_db($c, $bd);

    $tabla = $_POST['tabla'];
    $campo = $_POST['campo'];
    $tipo = $_POST['tipo'];

    $p = "  CREATE TABLE $tabla(
            $campo $tipo)
    ";

    if (mysqli_query($c, $p)) {
        echo "Tabla creada";
    } else {
        echo "Error al crear la tabla";
    }
}
