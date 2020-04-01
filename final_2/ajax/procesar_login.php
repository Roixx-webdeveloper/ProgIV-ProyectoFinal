<?php
require_once "../config.php";


    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        header("Content-Type: applications/json");
        $array_devolver=[];
        $correo= strtolower($_POST['correo']);
        $contrasena= $_POST['contrasena'];
        $nivel= 1;



        //Comprobar existencia
        $buscar_user= $con->prepare("SELECT * FROM usuarios WHERE
                                    correo = '$correo' LIMIT 1");
        $buscar_user->bindParam(':correo',$correo,PDO::PARAM_STR);
        $buscar_user->execute();

        if ($buscar_user->rowCount() == 1) {
           //Exite
           $user=$buscar_user->fetch(PDO::FETCH_ASSOC);
           $user_id=(int) $user['usuario_id'];
           $pass= (string) $user['contrasena'];
           if ($pass == $contrasena) {
              $_SESSION['usuario_id']=$user_id;
              $array_devolver['redirect']='http://localhost/final_2/dashboard.php';
           }else{
               $array_devolver['error']="Los datos no son validos.";
           }
        }else{
            $array_devolver['error']="No tienes cuenta";
        }

        echo json_encode($array_devolver);


    }else{
        exit("Fuerra de aqui");
    }