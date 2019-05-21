<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:26
 */

namespace oukhennicheAbdelkrim\SimplePhpOrm\ModelCom;
use oukhennicheAbdelkrim\SimplePhpOrm\ServicesCom\Req;


trait ModelTrait
{
    use ModelMainTrait;

    /**
     * @return Collection
     *
     */
    public static function getAll():Collection
    {
      $req = new Req(self::getTableName());
      return new Collection(self::getModels($req->get()));
    }


    /**
     * @param $id
     * @return Model | boolean
     */
    public static function find($id)
    {
        $req = new Req(self::getTableName());
        $dataModel= $req->where('id','=',$id)->get();
        if (!empty($dataModel)) return self::getModel($dataModel[0]);
        return false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->id;
    }
}
