<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Control tiempo</title>
    <p>
    <form method="post">  <!-- Formulario para creacion de botones inicio y fin -->
        <div>
            <label style="font-family: 'Arial Black'; font-size: 20px; color: #4cae4c">Inicio tiempo trabajo:
                <input type="submit" name="inicio" value="INICIO"> <!-- Boton inicio -->
            </label>
            <br>
            <br>
            <label style="font-family: 'Arial Black'; font-size: 20px; color: red">Fin tiempo trabajo:
                <input type="submit" name="fin" value="FIN"> <!-- Botones fin -->
            </label>
        </div>
    </form>
    </p>
</head>
</html>

<?php

echo "<br>";

function Inicio(){ // Funcion que toma los valores de tiempo actual
    $conn = mysqli_connect("localhost","user","manu", "tareas");  // Conexion BBDD

    if($conn->connect_error){
        die("Conexión fallida: " . $conn->connect_error); // Aviso en caso de fallo en conexion
    }

    $sql = "SELECT NOW()"; // Sql que proporciona el valor tiempo actual
    $time = mysqli_query($conn,$sql);  // Realiza consulta Sql a BBDD
    $resultado = mysqli_fetch_array($time); //Obtiene resultado como un array asociativo
    $inicio = $resultado[0]; // Toma el valor del array posicion 0

    $sql1 = "INSERT INTO tiempo (inicio) VALUES ('$inicio')"; // Sql inserta valor de array 0 en BBDD
    $insert = mysqli_query($conn,$sql1); // Realiza consulta Sql a BBDD
    mysqli_close($conn); // Cierre conexion con la BBDD

    echo '<label style="font-family: Arial Black; font-size: 20px; color: #1b6d85">Fecha hora inicio: </label>' . $inicio;
}


function Fin(){ // Funcion que calcula el tiempo transcurrido
    $conn = mysqli_connect("localhost","user","manu", "tareas");  // Conexion BBDD

    if($conn->connect_error){
        die("Conexión fallida: " . $conn->connect_error); // Aviso en caso de fallo en conexion
    }

    $sql = "SELECT NOW()";  // Sql que proporciona el valor tiempo actual
    $consulta = mysqli_query($conn,$sql);  // Realiza consulta Sql a BBDD
    $resultado = mysqli_fetch_array($consulta);  //Obtiene resultado como un array asociativo
    $fin = $resultado[0];  // Toma el valor del array posicion 0

    $sql2 = "SELECT COUNT(id) FROM tiempo";  // Sql cuenta el numero de valores id en tabla tiempo
    $ask = mysqli_query($conn,$sql2);  // Realiza consulta Sql a BBDD
    $result = mysqli_fetch_array($ask);
    $cont = $result[0];

    $sql3 = "UPDATE tiempo SET fin = '$fin' WHERE id = '$cont'";  // Sql actualiaza el campo fin de la entrada id tabla tiempo
    $insert = mysqli_query($conn,$sql3);  // Realiza consulta Sql a BBDD

    $sql4 = "SELECT inicio FROM tiempo WHERE id ='$cont'";  // // Sql busca valor inicio de id determinada tabla tiempo
    $consultazione = mysqli_query($conn,$sql4);  // Realiza consulta Sql a BBDD
    $risultato = mysqli_fetch_array($consultazione);  //Obtiene resultado como un array asociativo
    $start = $risultato[0];

    $timeseconds = strtotime($fin)-strtotime($start); // Calculo de tiempo total en segundos

    $sql5 = "UPDATE tiempo SET diff = '$timeseconds' WHERE id = '$cont'";  // // Sql actualiaza el campo diff de la entrada id tabla tiempo
    $ameliorer = mysqli_query($conn,$sql5);  // Realiza consulta Sql a BBDD

    $hour = floor($timeseconds / 3600); // Transformamos segundos en horas
    $minute = floor(($timeseconds - ($hour * 3600)) / 60); // Transformamos segundos en minutos
    $seconds = $timeseconds - ($hour * 3600) - ($minute * 60);  // Calculamos el numero de segundos

    $sql6 = "SELECT SUM(diff) FROM tiempo";  // Sql que calcula la suma total de valores columna diff tabla tiempo
    $beratung = mysqli_query($conn,$sql6);  // Realiza consulta Sql a BBDD
    $ergebnis = mysqli_fetch_array($beratung);  //Obtiene resultado como un array asociativo
    $total = $ergebnis[0];

    $tempo = floor($total / 3600);  // Transformamos segundos en horas
    $minuti = floor(($total - ($tempo * 3600)) / 60);  // Transformamos segundos en minutos
    $secondi = $total - ($tempo * 3600) - ($minuti * 60);  // Calculamos el numero de segundos

    mysqli_close($conn);  // Cierre conexion con la BBDD

    echo '<label style="font-family: Arial Black; font-size: 20px; color: blueviolet">Fecha hora fin: </label>'. $fin;
    echo "<br>";
    echo '<label style="font-family: Arial Black; font-size: 20px; color: royalblue">Tiempo transcurido: '. $hour.' horas '.$minute. ' minutos '.$seconds.' segundos </label>';
    echo "<br>";
    echo '<label style="font-family: Arial Black; font-size: 20px; color: darkturquoise ">Tiempo total invertido: '. $tempo.' horas '.$minuti. ' minutos '.$secondi.' segundos </label>';

}

if (array_key_exists('inicio',$_POST)) {
    inicio();
}elseif (array_key_exists('fin',$_POST)){
    fin();
}