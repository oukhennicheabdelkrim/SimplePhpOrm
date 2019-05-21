<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 20/05/2019
 * Time: 21:24
 */

include 'vendor/autoload.php';

require_once ('User.php');



$users = User::getAll();

foreach ($users as $user)
{
    echo $user->showUserName().'<br>';
}





























