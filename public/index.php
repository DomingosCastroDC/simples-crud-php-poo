<?php

use app\core\App;

require_once dirname(__DIR__)."/config/config.php";
require_once dirname(__DIR__)."/vendor/autoload.php";

$app = new App($config);

/*
Busca um user pelo id

$findOne = $app->query->findOne("user",["id" => 5]);

var_dump($findOne);

*/

/*

Busca todos usuários pelo status

$findAll = $app->query->findAll("user",["status" => 0]);

var_dump($findAll);
*/


/*
Insere um usuário 

$insert = $app->query->insert("user","firstname,lastname",":first,:last",[
    ":first" => "careca",
    ":last" => "Daummy"
]);

var_dump($insert);

*/

/*
Actualiza um usuário

$editar = $app->query->update("user","firstname = :first,lastname = :last","id = 11",[
    ":first" => "careca",
    ":last" => "Dummy"
]);

var_dump($editar);
*/

/*
Deleta um usuário

$delete = $app->query->delete("user","id = :id",[
    ":id" => 12,
]);

var_dump($delete);
*/

