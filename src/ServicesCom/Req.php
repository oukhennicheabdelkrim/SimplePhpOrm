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
    public static function get($tableName)
    {

            $req= Bdd::getInstance()->connection->prepare("select * from $tableName");
            $req->execute([]);
            return $req->fetchAll(\PDO::FETCH_ASSOC);
    }



}
