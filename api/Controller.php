<?php

/**
 * Created by PhpStorm.
 * User: Claudio Acioli
 * Date: 18/05/2017
 * Time: 15:37
 */
class Controller
{

    const MIN_LENGTH_QUERY_SEARCH = 3;

    public function GETAction($request)
    {
        $id_usuario = $request->auth_user;
        $id_comprador_grupo = $request->auth_pass;

        header("Content-Type: application/json; charset=utf-8");
        if(isset($request->parameters["q"]) && strlen($query=trim($request->parameters["q"]))> self::MIN_LENGTH_QUERY_SEARCH)
        {
            return CategoriaDAO::findByQuery($id_comprador_grupo, $query);
        }
        else
        {
            return CategoriaDAO::findByIdComprador($id_comprador_grupo);
        }
    }
}
?>