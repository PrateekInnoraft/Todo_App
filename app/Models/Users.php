<?php
/**
 * @file
 * Contains the Users model class.
 */

namespace app\Models;

use \core\View;

/**
 * Class Users
 *
 * Model class for handling user data and tasks.
 *
 * @package app\Models
 */
class Users extends \core\Model
{
    /**
     * @var string $Name User's name.
     */
    protected $Name;

    /**
     * @var string $Email User's email address.
     */
    protected $Email;

    /**
     * @var string $Password User's password.
     */
    protected $Password;

    /**
     * @var string $addTask Task to be added.
     */
    protected $addTask;

    /**
     * @var int $Task_no Task number.
     */
    protected $Task_no;

    /**
     * @var string $Task Task description.
     */
    protected $Task;

    /**
     * @var string $Confirm_Password User's password confirmation.
     */
    protected $Confirm_Password;

    /**
     * @var array $errors Array to store validation errors.
     */
    public $errors = [];

    /**
     * Users constructor.
     *
     * @param array $data User data to be set.
     */
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Save user data to the database.
     *
     * @return bool|int Return false if validation fails, otherwise return the result of the database query.
     */
    public function save()
    {
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

    /**
     * Validate user data.
     */
    public function validate()
    {
        if ($this->Name == '') {
            $this->errors[] = 'Name is required';
        }

        if (filter_var($this->Email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid Email';
        }

        if ($this->Password != $this->Confirm_Password) {
            $this->errors[] = 'Password must match confirmation';
        }
        if (static::emailExists($this->Email)) {
            $this->errors[] = 'Email already taken';
        }
    }

    /**
     * Check if email already exists in the database.
     *
     * @param string $Email User's email address.
     *
     * @return bool Return true if email exists, false otherwise.
     */
    public static function emailExists($Email)
    {
        return static::findByEmail($Email) != false;
    }

    /**
     * Find user by email and password in the database.
     *
     * @param string $Email User's email address.
     * @param string $Password User's password.
     *
     * @return Users|null Return user object if found, null otherwise.
     */

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

    /**
     * Find user by email in the database.
     *
     * @param string $Email User's email address.
     *
     * @return Users|null Return user object if found, null otherwise.
     */


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

    /**
     * Update the password in the database.
     *
     * @param string $Password User's password.
     *
     * return the result of the database query
     */


    public static function updatePassword($Password) {
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $sql = "UPDATE user_details SET Password = '$Password' WHERE Email = '$session_email'";
        return mysqli_query($db, $sql);    
    }

    /**
     * Add the task in the database using the query mentioned.
     *
     *
     * return the result of the database query
     */

    public function addTask(){
        if (empty($this->errors)) {
            $session_email = $_SESSION['Email'];
            $db = static::getDB();
            $Email = mysqli_real_escape_string($db, $session_email);
            $addTask = mysqli_real_escape_string($db, $this->addTask);
            $sql = "INSERT INTO task_details (Email, Task)
                    VALUES ('$Email', '$addTask')";
    
           return mysqli_query($db, $sql);
        }
            return false;
    }

    /**
     * Delete the task from the database.
     *
     * @param string $Task_no
     *
     * return the result of the database query
     */

    public function deleteTask($Task_no){
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $Task_no = mysqli_real_escape_string($db, $Task_no);
        $sql = "DELETE FROM task_details WHERE Task_no='$Task_no'";
        return mysqli_query($db, $sql);
    }


    /**
     * Update the task in the database.
     *
     * @param string $Task_no.
     * @param string $Task
     *
     * return the result of the database query
     */

    public function updateTask($Task_no,$Task){
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db, $session_email);
        $Task = mysqli_real_escape_string($db, $Task);
        $Task_no = mysqli_real_escape_string($db, $Task_no);
        $sql = "UPDATE task_details SET Task='$Task' WHERE Task_no='$Task_no'";
        return mysqli_query($db, $sql);
    }


    /**
     * Display all the tasks from the database.
     *
     * return the result of the database query.
     */

    public static function displayTask(){
        $session_email = $_SESSION['Email'];
        $db = static::getDB();
        $Email = mysqli_real_escape_string($db,$session_email);
        $sql = "SELECT Task_no,Task,Email FROM task_details WHERE Email='$Email'";
        $result = mysqli_query($db, $sql);
        $arr=[];
        while($row = mysqli_fetch_assoc($result)){
					$arr[]=$row;
        }
				return $arr;
    }

}
?>