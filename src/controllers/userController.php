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
                    $_SESSION['role'] = 'employee';
                }
                if ($user[0]['role']=='client') {
                    $_SESSION['role'] = 'client';
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
                    'variables' =>[]
            ];
        }
        else {
           echo 'You are already logged in';
    }}

    // Function for logging the user out from the system.
    public function logout() {   
        // Unset all $_SESSION variables.
        unset($_SESSION['loggedin']);
        unset($_SESSION['role']);
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
    
    public function registerSubmit(){

        $errors = [];
        if ($_POST['firstname'] == '') {
        $errors[] = 'You must enter a first name';
        }
        if ($_POST['surname'] == '') {
        $errors[] = 'You must enter a surname';
        }
        if ($_POST['email'] == '') {
        $errors[] = 'You must enter an email';
        }
        if ($_POST['password'] == '') {
        $errors[] = 'You must enter a password';
        }
        if (count($errors) == 0) {
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
        else {
        return $this->register($errors);
        }
        } 

        public function register($errors = []) {
            //If the form was submitted, show the POST values back
            //in the inputs
            return [
            'template' => 'register.php',
            'variables' => ['errors' => $errors],
            'title' => 'Register account'
            ];
           }
        
    
    public function employeeRegister($errors = []) {
        

        return [
            'template' => 'employeeRegister.php',
            'title' => 'Register Employees',
            'variables' =>  ['errors' => $errors]
        ];
    }


    public function employeeRegisterSubmit(){
        $errors = [];
        if ($_POST['firstname'] == '') {
        $errors[] = 'You must enter a first name';
        }
        if ($_POST['surname'] == '') {
        $errors[] = 'You must enter a surname';
        }
        if ($_POST['email'] == '') {
        $errors[] = 'You must enter an email';
        }
        if ($_POST['password'] == '') {
        $errors[] = 'You must enter a password';
        }
        if ($_POST['employee_code'] == '') {
            $errors[] = 'You must enter a employee code';
            }
        if (count($errors) == 0) {
            if (array_key_exists('users', $_POST)) {

                $employeeCode = $_POST['employee_code'];
                if ($employeeCode !== "45645") {
                    return [
                        'template' => 'wrongcode.php',
                        'title' => 'Bad Request',
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
                'title' => 'Success',
                'variables' => ['users' => $users ?? []]
            ];
        }
        else {
        return $this->employeeRegister($errors);
        }
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