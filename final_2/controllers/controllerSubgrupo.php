<?php
 require_once '../models/Subgrupos.php';
 /***Subgrupos */
 $Subgrupo= new Subgrupos();
 $txt_nombre=$_POST['txt_subgrupo_nombre'];
 $txt_grupo=intval($_POST['txt_grupo_id']);

 if (!empty($txt_grupo) && !empty($txt_nombre)) {
     $Subgrupo->insert($txt_grupo,$txt_nombre);
 }else{
     echo 'No se ha ingresado valores validos';
 }
 
 /**GRUPOS */