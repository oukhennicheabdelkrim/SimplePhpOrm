<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:26
 */

namespace App\ModelCom;
use App\ServicesCom\Req;


trait ModelStaticsTrait
{
    /**
     * @return Collection
     *
     */
    public static function getAll():Collection
    {
      return new Collection(self::getModels(Req::get(self::getTableName())));
    }

    /**
     * @return string
     *
     */
    public static function getTableName():string
    {
        $a = explode('\\',get_called_class());
        return strtolower($a[count($a)-1]).'s';
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
}
