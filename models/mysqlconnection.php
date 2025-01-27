<?php
    class MySqlConnection {
        // Parameters
        private static $host = 'localhost';
        private static $database = 'sakila';
        private static $user = 'root';
        private static $password = '';
        
        // Open connection
        public static function get_connection() {
            // Create connection
            $connection = mysqli_connect(
                self::$host, 
                self::$user,  // Debe ir el usuario aquí, no la base de datos
                self::$password, 
                self::$database // Base de datos se usa aquí
            );
            
            // Check connection
            if ($connection === false) {
                echo 'Could not connect to MySQL';
                die;
            }
            
            // Return connection
            return $connection;
        }
    }
?>
