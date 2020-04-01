<?php




    require_once '../models/Conceptos.php';
    $concepto= new Conceptos();
    
    $data=array();
  
    
    
    $paginacion= array();
    $pagina = $_POST['pagina'] ?? 1;
    $termino = $_POST['termino'] ?? '';
    $paginacion= $concepto->getPagination();
    $filasTotal=$paginacion['filasTotal'];
    $filasPagina=$paginacion['filasPagina'];
    $empezarDesde=($pagina-1)*$filasPagina;
   

    
    
    if ($termino!='') {
        $data=$concepto->getSearch($termino);
    }else{
        $data=$concepto->getAll($empezarDesde,$filasPagina);
    }
    echo $concepto->showTable($data);

