<?php
namespace app\Controllers;

use \core\View;
use \app\Models\Users;

class Signup extends \core\Controller
{

    public function newAction(){
        View::render('Signup/signup.php');
    }
    
    public function createAction(){
        $user = new Users($_POST);
        var_dump($_POST);
        if($user->save()) {
            header('Location: /Signup/success');
        }
        else{
            View::render('Signup/signup.php',[
                'user' => $user
            ]);
        }
    }

    public function successAction(){
        View::render('Signup/success.php');
    }

}
?>