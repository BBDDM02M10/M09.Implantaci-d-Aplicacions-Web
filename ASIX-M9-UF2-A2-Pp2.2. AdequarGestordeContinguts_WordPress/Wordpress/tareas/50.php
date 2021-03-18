<p>
<form method="post">  <!-- Formulario para indroduccion id elemento a borar -->
    <label style="font-family: Tahoma; font-size: 15px; font-weight: bolder; color: #2e6da4">Seleccione id a eliminar: </label>
    <input type="number" name="id" style="width: 60px;height: 20px; font-family: Tahoma" >
    <input type="submit" name="Borrar" value="Borrar">
</form>
</p>

<?php

function MostrarTarget() { // Funcion que muestra tareas creadas en la BBDD
    $conn = mysqli_connect("localhost","user","manu", "tareas"); // Conexion BBDD

    if($conn->connect_error){
        die("Conexión fallida: " . $conn->connect_error); // Aviso en caso de fallo en conexion
    }

    $sql = "SELECT * FROM trabajos";  // Sql para listar elementos tabla trabajos
    $consulta = mysqli_query($conn,$sql); // Realiza consulta Sql

    $resultado = mysqli_fetch_array($consulta); // Añadimos los resultados obtenidos a una array
    do {
        $datos[] = $resultado;
    } while ($resultado=mysqli_fetch_array($consulta)); // bucle que Obtiene una fila de resultados como un array asociativo

    mysqli_close($conn); // Cierre conexion con la BBDD

    echo '<table style="font-family: Tahoma; font-size: 22px; padding: 3px">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo "<th>   </th>";
    echo '<th style="padding: 5px">TARGETS</th>';
    echo '</tr>';
    echo '</table>';

    for ($d = 0; $d < count($datos); $d++) {  // bucle que lista los elementos del array y los muestra por pantalla
        $id = $datos[$d]["id"];
        $target = $datos[$d]['target'];

        echo '<table style="font-family: Tahoma; font-size: 17px; padding: 3px">';
        echo '<tr>';
        echo "<td style='padding: 5px'> $id </td>";
        echo "<td>   </td>";
        echo "<td style='padding: 5px'> $target </td>";
        echo '</tr>';
        echo '</table>';
    }

}
MostrarTarget();

function BorrarTarget() {  // Borra elemento BBDD
    $conn = mysqli_connect("localhost", "user", "manu", "tareas"); // Conexion BBDD

    $id = $_POST['id']; // Obtiene el elemento id del formulario
    $sql = "DELETE FROM trabajos WHERE id='$id'"; // Sql que busca el elementoa borrar
    $consulta = mysqli_query($conn, $sql); // Realiza consulta BBDD

    mysqli_close($conn); // Cierre conexion con la BBDD

}

if (array_key_exists('id',$_POST)) {
    BorrarTarget();
}




























