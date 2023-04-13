<?php

namespace app\Controllers;

use \app\Models\Users;

class Account extends \core\Controller
{
  public function validateEmailAction()
  {
    $is_valid = ! Users::emailExists($_GET['Email']);
    
    header('Content-Type: application/json');
    echo json_encode($is_valid);
  }
}