<?php
namespace app\Controllers;
use core\View;
use app\Models\Users;
use app\Mail;

class FP extends \core\Controller
{
    public function indexAction(){
        View::render('/ForgotPassword/fp.php');
    }

    public function sendotpAction(){
        if (isset($_POST['Email'])) {
            $this->sendPasswordReset($_POST['Email']);
        }
        View::render('/ForgotPassword/otp.php');
    }

    public static function sendPasswordResetAction($Email) {
        
        $user = Users::findByEmail2($Email);
        if ($user) {
          $_SESSION['Email'] = $Email;
          $OTP = rand(100000, 999999);
          $_SESSION['OTP'] = $OTP;
          $subject = "One Time Password generated";
          $string = "Your password OTP is $OTP";
          $html = "<h1>OTP is $OTP</h1>";
          Mail::send($Email, $subject, $string, $html);
        }
        else {
          header('Location: /Signup/new.php');
        }
    }

    public function checkOTPAction() {
        $var =(int)$_POST['OTP'];
        if ($_SESSION['OTP'] == $var) {
          //header('Location: ./GeneratePassword/index');
          View::render('GeneratePassword/gp.php');
          exit;
        }
        else {
          header('Location: /Home/index?error=wrong OTP');
        }
    }

    // public function resetPasswordAction() {
    //     if (isset($_SESSION['Email'])) {
    //       View::render('Password/resetpassword.php');
    //     }
    //     else {
    //       header('Location: /Home/index');
    //     }
    // }

    public function resetAction() {
        $user = Users::updatePassword($_POST['Password']);
        // $logout= new User;
        // $logout->Logout();
        if ($user) {
          $this->passwordsuccess();
          exit;
        }
        else {
          echo('Password not updated');
          header('Location: /Home/index');
          exit;
        }
    }

    public function passwordsuccessAction(){
        View::render('/ForgotPassword/passwordsuccess.php');
    }
}