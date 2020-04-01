<?php
require_once "../config.php";


    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        header("Content-Type: applications/json");
        $array_devolver=[];
        $correo= strtolower($_POST['correo']);
        $nombre= strtolower($_POST['nombre']);
        $nivel= 1;



        //Comprobar existencia
        $buscar_user= $con->prepare("SELECT * FROM usuarios WHERE
                                    correo = '$correo' LIMIT 1");
        $buscar_user->bindParam(':correo',$correo,PDO::PARAM_STR);
        $buscar_user->execute();

        if ($buscar_user->rowCount() == 1) {
            $array_devolver['error'] = "Este correo ya existe";
            $array_devolver['is_login']= false;
        }else{
            $contrasena=$_POST['contrasena'];
            $nuevo_user = $con->prepare("INSERT INTO usuarios (correo, nombre, contrasena, nivel_usuario_id) 
                                        VALUES(:correo, :nombre, :contrasena, :nivel_usuario_id )");
            
           
           
           
           
            $nuevo_user->bindParam(':correo',$correo, PDO::PARAM_STR);
            $nuevo_user->bindParam(':nombre',$nombre, PDO::PARAM_STR);
            $nuevo_user->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
            $nuevo_user->bindParam(':nivel_usuario_id',$nivel,PDO::PARAM_INT);
            $nuevo_user->execute();

            $user_id= $con->lastInsertId();
            $_SESSION['usuario_id']= (int) $user_id;
            $array_devolver['redirect']= 'http://localhost/final_2/dashboard.php';
            $array_devolver['is_login']=true;
            

        }

        echo json_encode($array_devolver);


    }else{
        exit("Fuerra de aqui");
    }