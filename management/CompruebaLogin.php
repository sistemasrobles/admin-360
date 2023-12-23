<?php 
session_start();

require '../conection/conexion.php';

require 'main.php';


if (isset($_POST['email']) && isset($_POST['password'])) {


  $email = $_POST['email'];

  $password = $_POST['password'];

  

  		$sql = "CALL sp_login(:email,:password)";


        $statement = $pdo->prepare($sql);
        $statement->bindParam(':email', $email, \PDO::PARAM_STR,20);
        $statement->bindParam(':password', $password, \PDO::PARAM_STR,10);
        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

       

        if(count($data) > 0){

        

        	 $_SESSION['user'] = array(

        	 	'name'=>$data[0]['name']

        	 );



        	$response = set_response('ok','acceso correcto',[]);

        }else{

        	$response = set_response('error','usuario y/o clave incorrecta',[]);
        }



        

      
        echo  json_encode($response); 




}else{

    $_SESSION = array();
    
	session_destroy();
}





?>