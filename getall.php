<?php

require('config.php');


$method = strtolower($_SERVER['REQUEST_METHOD']);

if( $method ==='get'){
    $sql = $pdo->query("SELECT * FROM ... ");
    if($sql->rowCount() > 0){
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $item){
            $aray['result'][]=[
                '...' => $item['...']

            ];
        }

    }



} else{
    $array['error'] = 'Metodo não permitido (apenas get)';
}



require('return.php');