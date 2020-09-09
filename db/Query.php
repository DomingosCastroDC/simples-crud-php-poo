<?php
namespace app\db;

class Query extends Connection
{
    public function __construct(array $query)
    {
        parent::__construct($query);
    }

    public static function findOne($table,$where)
    {
        $statement = self::find($table,$where);
        
        $statement->execute();

        return $statement->fetchObject();

    }

    public static function findAll($table,$where)
    {
        $statement = self::find($table,$where);
        
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);

    }

    public function insert($table,$column,$value,$params)
    {
        $statement = $this->query("insert into {$table} (".$column.") 
        VALUES (".$value.")",$params);

        return $statement->rowCount();
    }

    public function update($table,$column,$condition,$params)
    {
        $statement = $this->query("update {$table} set  {$column}  
        where {$condition}",$params);

        return $statement->rowCount();
    }

    public function delete($table,$condition,$params = [])
    {
        $statement = $this->query("delete from {$table} where {$condition}
        ",$params);

        return $statement->rowCount();
    }

    private function find($table,$where)
    {
        $attribute = array_keys($where);
        $sql = implode(" AND ",array_map(fn($attr) => "$attr = :$attr",$attribute));

        $statement = self::$pdo->prepare("SELECT * FROM $table Where $sql");
        
        foreach($where as $key => $value)
        {
            $statement->bindValue(":$key",$value);
            
        }

        return $statement;
    }

    public  function oneParam($statement,$key,$value)
    {
        $statement->bindValue($key,$value);
    }

    public function mostParams($statement,$params = [])
    {
        foreach($params as $key => $value)
        {
            $this->oneParam($statement,$key,$value);
        }
    } 

    public function query($query,$params = [])
    {
        $statement = self::$pdo->prepare($query);

        $this->mostParams($statement,$params);

        $statement->execute();

        return $statement;
    }

    
}