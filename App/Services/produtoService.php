<?php
    namespace App\Services;

    use App\Models\produtos;

    class produtoService
    {
        
        /*public function get($id = null)
        {
            
            if ($id){
                echo "meu id. $id";
                $produto = produtos::getProduto($id);
                var_dump($produto); 
            }else{
               // produtos::getAll($id);
            }
        }*/
        public function get()
        {
            return produtos::getProdutos();
        }
        public function post()
        {  
            $_POST = json_decode(file_get_contents('php://input'), true);
            $data = $_POST;
            var_dump($_POST);
            return produtos::insert($data);   
        }
}