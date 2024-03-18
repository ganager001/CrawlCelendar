<?php
    class Database {
        private $host;
        private $user;
        private $password;
        private $database;
        private $connection;

        public function __construct($host, $user, $password, $database) {
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
        }

        public function connect() {
            // Tạo kết nối MySQLi
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

            // Kiểm tra kết nối
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }

            return $this->connection;
        }

        public function disconnect() {
            // Đóng kết nối
            $this->connection->close();
        }
    }
    // Example usage:
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'shopddb';

    $database = new Database($host, $user, $password, $database);
    $database->connect();

    // Example query
    $results = $database->fetchAll('auth_user');
    foreach($results as $item){
        foreach($item as $a){
            echo $a;
        }
    }
    
    // Process $results...

    // Disconnect when done
    $database->disconnect();
    
?>
