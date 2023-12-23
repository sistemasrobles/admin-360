<?php 




function get_path($project){


    $path = '../../'.$project.'/';

    return $path;

}





function get_spots($pdo,$project){


        $sql = "SELECT * FROM items WHERE project=:project";


        $statement = $pdo->prepare($sql);
        $statement->bindParam(':project', $project, \PDO::PARAM_STR,50);
        
        $statement->execute();

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

  
        return  $data; 



}






function get_new_json($spots,$project){

   $file = get_path($project).'data-copia.js';

   $archivo = fopen($file, 'r');

   $contenido = fread($archivo, filesize($file));


  $data = json_decode($contenido, true);

  
 

  foreach($spots as $splits){


     $id_array = $splits["id"];

     $state_array  = $splits["state"] ;

     $mz  = $splits["360-mz"];

     $spot   =   $splits["360-spot"];

     $data["scenes"][$mz]["infoHotspots"][$spot]["estado"]  = $state_array;


  }





  

  $jsonString = json_encode($data);


   fclose($archivo);

  
   return $jsonString ;


}

$spots = get_spots($pdo,$project);
  

$rutaArchivo = get_path($project).'data-copia.js';

$contenidoNuevo = get_new_json($spots,$project);


if (file_put_contents($rutaArchivo, $contenidoNuevo) !== false) {

    $rpta =   set_response('ok','El lote se ha actualizado correctamente.',[]);

   

} else {
    
    $rpta =  set_response('ok','Ha ocurrido un error al actualizar el lote.',[]);


}




 ?>