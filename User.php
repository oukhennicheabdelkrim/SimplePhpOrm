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
    public function showUserName()
    {
        echo '<p>'.$this->name.'</p>';
    }
}
