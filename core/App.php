<?php
namespace app\core;

use app\db\Query;

class App
{
    public Query $query;
    public static App $app;

    public function __construct(array $config)
    {
        self::$app = $this;
        $this->query = new Query($config['db']);
    }
}