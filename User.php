<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 16:49
 */


use oukhennicheAbdelkrim\SimplePhpOrm\ModelCom\Model;

class User extends Model
{

    /**
     * @var array
     * [
     *  'dataname'=>'ModelClassName.foreignkey',
     *    ... ,
     *
     * ]
     * dataname : method to get data
     * ModelClassName : the name of class without namespaces
     * foreignkey : foreign key
     */

    public $hasMany = ['books' => 'Book.user_id'];

    public function show()
    {
        echo '<p>id :' .$this->id.'| name : '. ucfirst($this->name) . '</p>';

    }

}
