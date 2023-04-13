<?php
namespace app\Models;

use \core\View;

class Users extends \core\Model{
    protected $Name;
    protected $Email;
    protected $Password;
    
    protected $Confirm_Password;
    public $errors = [];


    public function __construct($data =[]){
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
    public function save(){
        // $this->validate();
        if (empty($this->errors)) {
        $db = static::getDB();
        $Name = mysqli_real_escape_string($db, $this->Name);
        $Email = mysqli_real_escape_string($db, $this->Email);
        $Password = mysqli_real_escape_string($db, $this->Password);
        $sql = "INSERT INTO user_details (Name, Email, Password)
                VALUES ('$Name', '$Email', '$Password')";

       return mysqli_query($db, $sql);
        }
        return false;
    }

    public function validate(){
        if ($this->Name == ''){
            $this->errors[] = 'Name is required';
        }

        if (filter_var($this->Email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid Email';
        }

        if ($this->Password != $this->Confirm_Password){
            $this->errors[] = 'Password must match confirmation';
        }
        if (static::emailExists($this->Email)){
            $this->errors[] = 'Email already taken';
        }
    }

    public static function emailExists($Email){
        return static::findByEmail($Email) != false;   
    }

    public static function findByEmail($Email,$Password)
    {
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db, $Email);
        $Password = mysqli_real_escape_string($db, $Password);
        $sql = "SELECT * FROM user_details WHERE Email='$Email'AND Password='$Password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    
        // Convert the row to an object
        $user = null;
        if ($row) {
            $user = new static();
            foreach ($row as $key => $value) {
                $user->$key = $value;
            }
        }
        return $user;
    }

    public static function findByEmail2($Email)
    {
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db, $Email);
        $sql = "SELECT * FROM user_details WHERE Email='$Email'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    
        // Convert the row to an object
        $user = null;
        if ($row) {
            $user = new static();
            foreach ($row as $key => $value) {
                $user->$key = $value;
            }
        }
        return $user;
    }

    public static function updatePassword($Password) {
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $sql = "UPDATE user_details SET Password = '$Password' WHERE Email = '$session_email'";
        return mysqli_query($db, $sql);    
      }

}
?>