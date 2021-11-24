<?php

require('config.php');


$method = strtolower($_SERVER['REQUEST_METHOD']);

if( $method ==='delete'){
   parser_str(file_get_contents('php://input'), $input );
   $id = $input['id'] ?? null;
   
    
   $id = filter_var($id);
   

   if($id){

    $sql = $pdo->prepare("SELECT * FROM ... WHERE id =:id");
    $sql->bindValue(':id',$id);
    $sql->execute();

    if($sql->rowCount() >0){

        $sql = $pdo->prepare("DELETE FROM ... WHERE id = :id");
        $sql ->bindValue('id', $id);
        $sql ->execute();

        $array['result'] = [
            'rsultado' => 'Excluido com sucesso!!!'
           
        ];


    }else{
        $array['error'] = 'Id não existe';
   }else{
    $array['error'] = 'Dado não enviado';


   }
    

} else{
    $array['error'] = 'Metodo não permitido (apenas delete)';
}



require('return.php');