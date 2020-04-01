<?php
    require_once '../models/Conceptos.php';
    
    $concepto=new Conceptos();
    $paginacion= array();
    $paginacion= $concepto->getPagination();
    
    $filasTotal=$paginacion['filasTotal'];
    $filasPagina=$paginacion['filasPagina'];
    echo ceil($filasTotal/$filasPagina);
