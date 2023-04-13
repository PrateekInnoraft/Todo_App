<?php
namespace app\Controllers;
use core\View;
use app\Models\Users;

class GeneratePassword extends \core\Controller
{
    public function indexAction(){
        View::render('/GeneratePassword/gp.php');
    }
}