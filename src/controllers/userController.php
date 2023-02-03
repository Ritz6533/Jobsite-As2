<?php
namespace src\Controllers;
class UserController {
    private $usersTable;


    public function __construct(\CSY2028\DatabaseTable $usersTable) {
        $this->usersTable = $usersTable;

    }

    // Function for submitting the login form.
    public function loginSubmit(){
        if (array_key_exists('users', $_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $user = $this->usersTable->find('email', $email);
            if (!empty($user) && password_verify($password, $user[0]['password'])) {
              
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user[0]['id'];
                if ($user[0]['role']=='employee') {
                    $_SESSION['employee'] = true;
                }
                if ($user[0]['role']=='client') {
                    $_SESSION['client'] = true;
                }
    
                return [
                    'template' => 'dashboard.php',
                    'title' => 'Dashboard',
                    'variables' => [
                        'users' => $user[0]
                    ]
                ];
            } else {
                return [
                    'template' => 'wrongcode.php',
                    'title' => 'Error',
                    'variables' => [
                    ]
                ];
            }
        }
    }

    
       

    // Function for displaying the login form.
    public function login() {
        // display the form.
        if (!isset($_SESSION['loggedout'])) {
    
 

            return [
                    'title' => 'Log in',
                    'template' => 'login.php',
                    'variables' => [

                        
                    ]
            ];
        }
        else {
           echo 'You are already logged in';
    }}

    // Function for logging the user out from the system.
    public function logout() {   
        // Unset all $_SESSION variables.
        unset($_SESSION['loggedin']);
        unset($_SESSION['employee']);
        unset($_SESSION['client']);
        unset($_SESSION['id']);

        return [
            'template' => 'logout.php',
            'variables' => [],
            'title' => 'Log out'
        ];
    }

    public function applicantslist(){

        return [
            'template' => 'applicants.php',
            'title' => 'Applicant List',
            'variables' => [
            ]
        ];
    }
    public function register(){

        return [
            'template' => 'register.php',
            'title' => 'Register',
            'variables' => [
            ]
        ];
    }
    public function registerSubmit(){

        if (array_key_exists('users', $_POST)) {
            $users = [
                'role' => 'client',
                'firstname' => $_POST['firstname'],
                'surname' => $_POST['surname'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // use password_hash() function to hash the password
                'email' => $_POST['email']
            ];
            $this->usersTable->insert($users);
        }
        return [
            'template' => 'usersuccess.php',
            'title' => 'User Added',
            'variables' => ['users' => $users ?? []]
        ];
    }
    public function employeeRegister() {
        

        return [
            'template' => 'employeeRegister.php',
            'title' => 'Register Employees',
            'variables' => [
            ]
        ];
    }

    public function employeeRegisterSubmit(){

        if (array_key_exists('users', $_POST)) {

            $employeeCode = $_POST['employee_code'];
            if ($employeeCode !== "45645") {
                return [
                    'template' => 'wrongcode.php',
                    'title' => 'User Added',
                    'variables' => []
                ];
            }

            $users = [
                'role' => 'employee',
                'firstname' => $_POST['firstname'],
                'surname' => $_POST['surname'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // use password_hash() function to hash the password
                'email' => $_POST['email']
            ];
            $this->usersTable->insert($users);
        }
        return [
            'template' => 'usersuccess.php',
            'title' => 'User Added',
            'variables' => ['users' => $users ?? []]
        ];
    }

    public function dashboard(){

        return [
            'template' => 'dashboard.php',
            'title' => 'Dashboard',
            'variables' => [
            ]
        ];
    }

}