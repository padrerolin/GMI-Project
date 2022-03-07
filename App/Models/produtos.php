<?php
    namespace App\Models;

    class produtos
    {
        private static $table = 'produtos';
        /*Puxando 1 produto
        
        public static function getProduto(string $id) {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.';dbname='.\DBNAME, DBUSER, DBPASS);

            $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
            $stmt = $connPdo->prepare($sql);
            $stmt ->bindValue(':id', $id);
            $stmt ->execute();

            if($stmt ->rowCount()>0){ 
                return $stmt ->fetch(\PDO::FETCH_ASSOC);
            } else{
                throw new \Exception("Nenhum usuario foi encontrando !");
            }*/
        public static function getProdutos()
        {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.';dbname='.\DBNAME, DBUSER , DBPASS);
            $sql = 'SELECT * FROM '.self::$table;
            $stmt = $connPdo->prepare($sql);
            $stmt ->execute();
            if($stmt ->rowCount()>0){
            
                return $stmt ->fetchAll(\PDO::FETCH_ASSOC);
            }else{
                throw new \Exception("Não existe produtos registrados !");
            }
        }

        public static function insert($data)
        {
            $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.';dbname='.\DBNAME, DBUSER , DBPASS);
            
            $sql = 'INSERT INTO '.self::$table.' (titulo, preco,start_time) values (:ti, :pe, :st)';
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':ti', $data['title']);
            $stmt->bindValue(':pe', $data['price']);
            $stmt->bindValue(':st', $data['start_time']);
            $stmt ->execute();
            
            if($stmt ->rowCount()>0) { 
                return 'Produto inserido com sucesso!';
            } else{
                throw new \Exception("Falha ao inserir produto");
            }
        }

    }

    