<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 17:12
 */

namespace oukhennicheAbdelkrim\SimplePhpOrm\ModelCom;


interface ModelIntrface
{

    /**
     * @return Collection
     */
    static function getAll():Collection;

    /**
     * @return string
     */
    static function getTableName():string ;

    /**
     * @param array $data
     * @return array
     */
    static function getModels(array $data) : array;

    /**
     * @param $data
     * @return Model
     */
    static function getModel(array $data): Model;

    /**
     * @return mixed
     */
    function getId():int;


}
