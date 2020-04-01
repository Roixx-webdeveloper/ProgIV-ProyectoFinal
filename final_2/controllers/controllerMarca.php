<?php
 require_once '../models/Marcas.php';
 /***MARCASS */
 $marcas= new Marcas();
 $marca_nombre=$_POST['txt_marca_nombre'];
 if (!empty($marca_nombre)) {
     $marcas->insert($marca_nombre);
 }else{
     echo 'No se ha ingresado una marca';
 }
 
 /**GRUPOS */