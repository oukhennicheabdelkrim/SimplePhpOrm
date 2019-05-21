<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 22:57
 */

namespace oukhennicheAbdelkrim\SimplePhpOrm\ModelCom;


use oukhennicheAbdelkrim\SimplePhpOrm\ServicesCom\Req;

trait ModelMainTrait
{

    /**
     * @return mixed
     * associate data to model
     */

    private function loadModel($data)
    {
        foreach ($data as $attribut=>$params)
        {

            $this->$attribut = $params;
        }
    }


    /**
     * @return string
     */
    public static function getTableName():string
    {
        $a = explode('\\',get_called_class());
        return self::modelClassNameToTable($a[count($a)-1]);
    }


    /**
     * @param $classNameWithOutNameSpaces
     * @return string
     */
    private static function modelClassNameToTable($classNameWithOutNameSpaces)
    {
        return strtolower($classNameWithOutNameSpaces).'s';
    }

    /**
     * @param array $data
     * @return array
     * get Array of models from array
     */
    public static function getModels(array $data) : array
    {
        $modelClass=get_called_class();
        $models = [];
        foreach ($data as $d)
            $models[]=new $modelClass($d);
        return $models;
    }

    /**
     * @param $data
     * @return Model
     * get model from array
     */
    public static function getModel(array $data): Model
    {
        $modelClass=get_called_class();
        return new $modelClass($data);
    }



    public function __call($method, $arguments){
        if (isset($this->hasMany[$method]))
        {
            return $this->loadHasMany($this->hasMany[$method]);
        }

    }

    /**
     * @param $joinInfo array ['ModelName.foreignkey']
     * Get a collection for a hasMany relation
     */
    private function loadHasMany($joinInfos){
        $joinInfos_array = explode('.',$joinInfos);
        $req = new Req(self::modelClassNameToTable($joinInfos_array[0]));
        $req->where($joinInfos_array[1],'=',$this->getId());
        return new Collection($joinInfos_array[0]::getModels($req->get()));

    }
}
