<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:08
 */

namespace oukhennicheAbdelkrim\SimplePhpOrm\ServicesCom;

/**
 * Class Req
 * @package oukhennicheAbdelkrim\SimplePhpOrm\ServicesCom
 * make request to the database
 */
class Req
{
    private $where = '';
    private $executeArray = [];
    private $tableName = '';

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @param $tableName
     * @return mixed
     */
    public function get()
    {
        $req = Bdd::getInstance()->connection->prepare("select * from " . $this->tableName . $this->getWhereReq());
        $req->execute([]);
        $this->clearCache();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }


    /**
     * @param $a string|int
     * @param $p string
     * @param $b string|int
     */
    public function where($a, $p, $b)
    {
        $this->where .= ' '.$a . ' ' . $p . ' ' . $b.' ';
        return $this;
    }

    /**
     * @return string
     */
    private function getWhereReq()
    {
        if (empty($this->where)) return ''; else
            return ' where ' . $this->where;
    }

    private function clearCache()
    {
        $this->where='';
        $this->executeArray=[];
    }


}
