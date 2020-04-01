<?php
require_once '../models/Grupos.php';
$grupos= new Grupos();
$txt_grupo=$_POST['txt_grupo'];


if (!empty($txt_grupo)) {
    $grupos->insert($txt_grupo);
}else{
    echo 'No se ha ingresado un grupo';
}
