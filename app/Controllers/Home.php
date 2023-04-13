<?php
namespace app\Controllers;
use core\View;
use app\Models\Users;

class Home extends \core\Controller
{
    protected function before()
    {
        // echo "(before) ";
        //return false;
    }

    protected function after()
    {
        // echo " (after)";
    }

    public function indexAction()
    {
        View::render('Home/index.php');
    }

    public function createAction(){
        $user = Users::findByEmail($_POST['Email'],$_POST['Password']);
        if($user){
            $_SESSION['Email']=$_POST['Email'];
            View::render('/MainPage/mainpage.php');
        }
        else{
            echo "Invalid Username or Password";
            View::render('Home/index.php');
        }
        }
}