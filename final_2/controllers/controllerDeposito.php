<?php
 require_once '../models/Depositos.php';
 /**DEPOSITOS */
 $depositos= new Depositos();
 $Deposito_nombre=$_POST['txt_deposito_nombre'];
 
 if (!empty($Deposito_nombre)) {
     $depositos->insert($Deposito_nombre);
 }else{
     echo 'No se ha ingresado un deposito';
 }
 