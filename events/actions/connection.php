<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'kanban';
        private $connection;

        public function connect(){
            $this->connection = null;
            try
            {
                $this->connection = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=utf8', 
                $this->username, $this->password);
            }
            catch(Exception $e)
            {
                die('Erro : '.$e->getMessage());
            }

            return $this->connection;
        }
    }
?>
