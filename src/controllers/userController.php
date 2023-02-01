<?php
namespace src\Controllers;
class UserController {
    private $usersTable;


    public function __construct(\CSY2028\DatabaseTable $usersTable) {
        $this->usersTable = $usersTable;

    }

   

    // Function for submitting the login form.
    public function loginSubmit() {
        if (isset($this->post['submit'])) {
            $user = $this->usersTable->retrieveRecord('username', $this->post['login']['username']);

            $username = strtolower($this->post['login']['username']);
            $password = $this->post['login']['password'];
            $passwordWithUsername = $username . $password;

            $error = '';

            if ($username != '' && $password != '')
                if (!empty($user)) {
                    if (password_verify($passwordWithUsername, $user[0]->password) == true) {
                        if ($user[0]->active == 0)
                            $error = 'Your account has not been activated. Please contact an administrator.';
                    }
                    else
                        $error = 'The password provided is incorrect.';
                }
                else
                    $error = 'A user with the username provided does not exist.';
            else
                $error = 'You have not provided a username and/or password.';

            // Check if the $error variable has no value. If so,
            // log the user into the system and set roles accordingly.
            if ($error == '') {
                session_start();

                if ($user[0]->role == 3)
                    $_SESSION['isOwner'] = true;
                elseif ($user[0]->role == 2)
                    $_SESSION['isAdmin'] = true;
                elseif ($user[0]->role == 1)
                    $_SESSION['isEmployee'] = true;
                else
                    $_SESSION['isClient'] = true;

                $_SESSION['username'] = $user[0]->username;
                $_SESSION['id'] = $user[0]->id;

                $_SESSION['loggedIn'] = true;
                header('Location: /admin');
            }
            else {
                return [
                    'template' => 'adminindex.php',
                    'variables' => [
                        'error' => $error
                    ],
                    'title' => 'Log in'
                ];
            }
        }
    }

    // Function for displaying the login form.
    public function login() {
        // display the form.
        if (!isset($_SESSION['loggedIn'])) {
    
 

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
        unset($_SESSION['loggedIn']);
        unset($_SESSION['username']);
        unset($_SESSION['id']);

        return [
            'template' => 'logout.html.php',
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
    public function employeeRegister(){

        return [
            'template' => 'employeeRegister.php',
            'title' => 'Register Employees',
            'variables' => [
            ]
        ];
    }
}
?>