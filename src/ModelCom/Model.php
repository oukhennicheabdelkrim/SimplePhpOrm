<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:00
 */
namespace  oukhennicheAbdelkrim\SimplePhpOrm\ModelCom;

/**
 * Class Model
 * @package oukhennicheAbdelkrim\SimplePhpOrm\ModelCom
 */
abstract class Model implements ModelIntrface
{
    protected $hasMany=[];
    use ModelTrait;


    function __construct(array $data)
    {
        $this->loadModel($data);
    }

}
