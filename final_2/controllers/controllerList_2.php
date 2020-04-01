<?php

    require_once '../models/Movimiento_Depositos.php';


    $movimientos= new Movimiento_Depositos();

    $datos=array();
    $datos=$movimientos->getAll();

    echo $movimientos->showTable($datos);
