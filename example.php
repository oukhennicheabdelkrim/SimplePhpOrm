<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 20/05/2019
 * Time: 21:24
 */
include 'vendor/autoload.php';


use oukhennicheAbdelkrim\SimplePhpOrm\ModelCom\Model;

class User extends Model{

    public $hasMany = ['books' => 'Book.user_id'];
    public function show(){
        echo '<p>id :' .$this->id.'| name : '. ucfirst($this->name) . '</p>';
    }

}

class Book extends Model{

}


$user = User::find(2); // find and get user by id
$user->show();

$books = $user->books(); // get user books using hasMany attribute;

if ($books->count()==0)
    echo $user->name , ' does not have any book.';
else
    foreach ($books as $book)
    {
        echo $book->title,'<br>';
    }

// get All Users
$users = User::getAll();

// show users

echo '<h3>Users : </h3>';
foreach ($users as $user)
    $user->show();


