<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:08
 */

namespace oukhennicheAbdelkrim\SimplePhpOrm\ServicesCom;

class Req
{
    public static function get($tableName,$column='*',$cond=[])
    {
        if (empty($cond))
        {
            $req= Bdd::getInstance()->connection->prepare("select ".self::parseColumn($column)." from $tableName");
            $req->execute([]);
            return $req->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

    private static  function parseColumn(String $columns)
    {
        if ($columns!="*")
            return implode(',',$columns);
        return $columns;
    }

}
