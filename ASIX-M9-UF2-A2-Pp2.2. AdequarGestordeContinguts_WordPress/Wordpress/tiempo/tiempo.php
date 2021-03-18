<?php

/*
Plugin Name: Tiempo
Plugin URI: https://manu.jamoreros.cat
Description: Plugin tiempo proyecto
Version: 1.0
Author: manu
Author URI: https://manu.jamoreros.cat
License: GPL2
*/

add_action('admin_menu','CrearMenu1');

function CrearMenu1(){ // Funcion de creacion menu plugin
    add_menu_page(
        'Tiempo Proyecto',//Titulo de la pagina
        'Tiempo',// Titulo del menu
        'manage_options', // Capability
        'sp_menu', //slug
        'MostrarContenido1' // Funcion
    );


}

function MostrarContenido1(){ // Funcion de visualizacion de plugin
    echo "<p>";
    echo '<label style="font-family: Arial Black; font-size: 30px; 
                 color: black">Control Tiempo Proyecto</label>';  // Titulo pagina plugin
    echo "</p>";
    require (plugin_dir_path(__FILE__).'40.php');  // Redireccion a archivo creacion de plugin
}

