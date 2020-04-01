<?php
    require_once '../models/Conceptos.php';
   

   
   
    
   
    

    
    /**CONCEPTOS */
    $opcion= $_POST['opcion'];
    $concepto = new Conceptos();
    $concepto_id=intval($_POST['concepto_id']);
    $sku=$_POST['sku'];
    $nombre=$_POST['nombre'];
    $codigo=$_POST['codigo'];
    $referencia=$_POST['referencia'];
    $descripcion=$_POST['descripcion'];
    $precio=intval($_POST['precio']);
    $costo=intval($_POST['costo']);
    $ultimo_costo=intval($_POST['ultimo_costo']);
    $utilidad=intval($_POST['utilidad']);
    $grupo_id=intval($_POST['grupo_id']);
    $subgrupo_id=intval($_POST['subgrupo_id']);
    $marca_id=intval($_POST['marca_id']);
    $unidad_id=intval($_POST['unidad_id']);

    if (!empty($opcion)) {
        switch ($opcion) {
            case 'insertar':
               if (!empty($sku) && !empty($nombre) &&!empty($codigo)&&!empty($referencia)&&!empty($descripcion)
                   &&!empty($precio)&&!empty($costo)&&!empty($ultimo_costo)&&!empty($utilidad)
                   &&!empty($grupo_id)&&!empty($subgrupo_id)&&!empty($marca_id)&&!empty($unidad_id)) {
                    $concepto->insert($sku,$nombre,$codigo,$referencia,
                                        $descripcion,$precio,$costo,$ultimo_costo,$utilidad,
                                        $grupo_id,$subgrupo_id,$marca_id,$unidad_id);
               }else{
                   echo'VACIO';
               }
                break;
            case 'editar':
                if (!empty($concepto_id)&&!empty($sku) &&!empty($nombre) &&!empty($codigo)&&!empty($referencia)&&!empty($descripcion)
                   &&!empty($precio)&&!empty($costo)&&!empty($ultimo_costo)&&!empty($utilidad)
                   &&!empty($grupo_id)&&!empty($subgrupo_id)&&!empty($marca_id)&&!empty($unidad_id)){
                      
                    $concepto->edit($concepto_id,$sku,$nombre,$codigo,$referencia,
                                        $descripcion,$precio,$costo,$ultimo_costo,$utilidad,$grupo_id,
                                        $subgrupo_id,$marca_id,$unidad_id);
                   }
                else{
                    echo 'VACIO';
                }
                break;
            case 'eliminar':
                if (!empty($concepto_id)) {
                    $concepto->delete($concepto_id);
                }else{
                    echo 'VACIO';
                }
                break;
            
        }
    }else{
        
    }
   