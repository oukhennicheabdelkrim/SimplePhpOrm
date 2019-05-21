<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:00
 */
namespace  oukhennicheAbdelkrim\SimplePhpOrm\ModelCom;

abstract class Model implements ModelIntrface
{

    use ModelStaticsTrait;
    function __construct($array)
    {
        foreach ($array as $k=>$params)
        {
            $this->$k = $params;
        }
    }

    public function getId():int
    {
        // TODO: Implement getId() method.
        return $this->id;
    }

}
