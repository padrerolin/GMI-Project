<?php

    require_once '../vendor/autoload.php';
    header("Access-Control-Allow-Origin: *"); 
    header("Access-Control-Allow-Headers: *");

    // api/users/1
    if($_GET['url']){
        $url = explode('/',$_GET['url']);

        if($url[0] === 'api'){
            //removendo primeiro registro
            array_shift($url);

            $service = 'App\Services\\'.$url[0].'Service';
            array_shift($url);

            $method = $_SERVER['REQUEST_METHOD'];
            
            try{
               $response =  call_user_func_array(array(new $service, $method), $url);

               echo json_encode(array('status' => 'sucess','data'=> $response));

            }catch (\Exception $e) {
            var_dump($e);
            }
        }
        
    }
    

    
    