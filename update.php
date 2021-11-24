<?php

require('config.php');


$method = strtolower($_SERVER['REQUEST_METHOD']);

if( $method ==='put'){
   parser_str(file_get_contents('php://input'), $input );
   $id = $input['id'] ?? null;
   $title = $input['title'] ?? null;
    
   $id = filter_var($id);
   $title = filter_var($title);
   $body = filter_var($body);

   if($id && $title && $body){

    $sql = $pdo->prepare("SELECT * FROM ... WHERE id =:id");
    $sql->bindValue(':id',$id);
    $sql->execute();

    if($sql->rowCount() >0){

        $sql = $pdo->prepare("UPDATE ... SET title = :title, body = :body = :body WHERE id = :id");
        $sql ->bindValue('id', $id);
        $sql ->bindValue('title', $title);
        $sql ->bindValue('id', $body);
        $sql ->execute();

        $array['result'] = [
            'id' => $id,
            'title' => $title,
            'body' => $body
        ];


    }else{
        $array['error'] = 'Id não existe';
   }else{
    $array['error'] = 'Dados não enviado';


   }
    

} else{
    $array['error'] = 'Metodo não permitido (apenas put)';
}



require('return.php');