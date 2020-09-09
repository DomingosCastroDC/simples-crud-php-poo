<?php
namespace app\db;

use PDO;

class Connection 
{
    public static ?PDO $pdo = null;

    public function __construct(array $config)
    {
        $this->connection($config);
    }

    protected function connection(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';

        try {
            self::$pdo = new PDO($dsn,$user,$password);

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return self::$pdo;

        } catch (\Exception $e) {
            echo "Error Code ".$e->getCode() . "<br>";
            echo "Error Message ".$e->getMessage() . "<br>";
        }
    }

    
}