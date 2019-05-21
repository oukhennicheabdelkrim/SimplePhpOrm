<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 20/05/2019
 * Time: 21:24
 */

include 'vendor/autoload.php';

use App\Model\User;


$users = User::getAll();

foreach ($users as $user)
{
    echo $user->showUserName().'<br>';
}





























