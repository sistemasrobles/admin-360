<?php 


session_start();

if(!isset($_SESSION['user'])){


header('Location: login');


}


require '../conection/conexion.php';

require 'main.php';


$type = $_GET['type'];

$param1 = $_GET['param1'];

$param2 = $_GET['param2'];

$param3 = $_GET['param3'];

switch ($type) {

    case 'list_items':

        $spots = list_items($pdo,$param1);

		echo json_encode($spots);

        break;

    case 'updated_item':
       
    	$rpta = updated_item($pdo,$param1,$param2,$param3);

		echo json_encode($rpta);


        break;
    
}




function list_items($pdo,$project){


        $sql = "CALL sp_list_items(:project)";


        $statement = $pdo->prepare($sql);
        $statement->bindParam(':project', $project, \PDO::PARAM_STR,50);
        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

  
        return  $data; 



}


function updated_item($pdo,$state,$id,$project){


        $sql = "CALL sp_update_item(:state,:id)";


        $statement = $pdo->prepare($sql);
        $statement->bindParam(':state', $state, \PDO::PARAM_STR,50);
        $statement->bindParam(':id', $id, \PDO::PARAM_INT);
        $statement->execute();

      
    	//$rpta = set_response('ok','Lote actualizado correctamente',[]);

    	require_once 'UpdatedData.php';


	   return $rpta ; 


}


