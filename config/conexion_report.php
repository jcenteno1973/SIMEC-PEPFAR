<?php

/* Nombre del archivo:conexion_report.php
 * Descripción:
 * Autor:Juan Carlos Centeno
 * Fecha:07/12/2016
 * 
 * Modificado por: Karla Barrera
 * Fecha: 12/12/2016
 * Descripción: usando variables de configuración para conexión con BD
 */

return array(
  'conexion'=>[
      'driver' => 'mysql',                
      'host' => env('DB_HOST', 'localhost'),
      'port' => '3306',
      'database' => env('DB_DATABASE', 'forge'),               
      'username' => env('DB_USERNAME', 'forge'),
      'password' => env('DB_PASSWORD', ''),
  ]  
);