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
    /**
     * @var array
     * [
     *   'dataname'=>'ModelClassName.foreignkey'
     *                  ...
     * ]
     * dataname : method to get data
     * ModelClassName : the name of class without namespaces
     * foreignkey : foreign key
     *
     */
    protected $hasMany=[];
    use ModelTrait;


    function __construct(array $data)
    {
        $this->loadModel($data);
    }

}
