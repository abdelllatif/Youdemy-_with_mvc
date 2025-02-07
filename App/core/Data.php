<?php
class Data {
    private static $conn = null;
    private $dbname;
    private $host;
    private $user;
    private $password;

    public function __construct($dbname = 'youdemy', $host = 'localhost', $user = 'postgres', $password = 'farabi2005') {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $charset = 'utf8mb4';
    }

    public function connection() {
        if (self::$conn === null) {
            try {
                $dsn = "pgsql:host={$this->host};dbname={$this->dbname}";
                self::$conn = new PDO($dsn, $this->user, $this->password,);
            } catch (PDOException $e) {
                echo "Connection not available: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}
?>
