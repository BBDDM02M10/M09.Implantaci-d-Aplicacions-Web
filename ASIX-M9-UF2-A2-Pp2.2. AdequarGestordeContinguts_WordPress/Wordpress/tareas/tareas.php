<?php

/*
Plugin Name: Tareas
Plugin URI: https://manu.jamoreros.cat
Description: Plugin tareas proyecto
Version: 1.0
Author: manu
Author URI: https://manu.jamoreros.cat
License: GPL2
*/

add_action('admin_menu','CrearMenu');

function CrearMenu(){ // Funcion de creacion menu plugin
    add_menu_page(
        'Tareas Proyecto',//Titulo de la pagina
        'Tareas',// Titulo del menu
        'manage_options', // Capability
        'sp_menu', //slug
        'MostrarContenido' // Funcion
    );


}

function MostrarContenido(){ // Funcion de visualizacion de plugin
    echo "<p>";
    echo '<label style="font-family: Arial Black; font-size: 30px; 
                 color: black">Control Tareas Proyecto</label>'; // Titulo pagina plugin
    echo "</p>";
    require (plugin_dir_path(__FILE__).'50.php'); // Redireccion a archivo creacion de plugin
}

