<?php
namespace src;
class Routes {
    public function getPage($route) {
        require '../dbconnect.php';

        $jobsTable = new \CSY2028\DatabaseTable($pdo, 'job', 'id');
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $usersTable = new \CSY2028\DatabaseTable($pdo, 'users', 'id');
        $enquiriesTable = new \CSY2028\DatabaseTable($pdo, 'enquiries', 'id');

        $controllers = [];
        $controllers['job'] = new \src\Controllers\Job($jobsTable);
        $controllers['category'] = new \src\Controllers\Category($categoriesTable);
        $controllers['user'] = new \src\Controllers\Usercontroller($usersTable);
        $controllers['enquiries'] = new \src\Controllers\enquiries($enquiriesTable);


        switch ($route) {
            case '':
                return $controllers['job']->home();
                break;
            case 'faqs':
                return $controllers['job']->faq();
                break;
            case 'about':
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    return $controllers['enquiries']->about();
                } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['enquiries']->aboutSubmit();
                }
                break;
            case 'it':
                return $controllers['job']->it();
                break;
            case 'hr':
                return $controllers['job']->hr();
                break;
            case 'sales':
                return $controllers['job']->sales();
                break;
            case 'jobs':
                return $controllers['job']->list();
                break;
            case 'login':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['user']->loginSubmit();
                }
                    else  {
                        return $controllers['user']->login();
                    }
                return $controllers['user']->login();
                break;
            case 'logout':
                return $controllers['user']->logout();
                break;
            case 'category':
                return $controllers['category']->listcat();
                break;
            case 'applicants':
                return $controllers['user']->applicantslist();
                break;
            case 'addjob':
                return $controllers['job']->addjob();
                break;
            case 'editjob':
                return $controllers['job']->editjob();
                break;
            case 'deletejob':
                return $controllers['job']->deletejob();
                break;
            case 'apply':
                return $controllers['job']->apply();
                break;
            case 'editcategory':
                return $controllers['category']->edit();
                break;
            case 'deletecategory':
                return $controllers['category']->delete();
                break;
            case 'addcategory':
                return $controllers['category']->add();
                break;
            case 'register':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['user']->registerSubmit();
                }
                    else  {
                        return $controllers['user']->register();
                    }
                
                break;
            case 'employeeRegister':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['user']->employeeRegisterSubmit();
                }
                    else  {
                        return $controllers['user']->employeeRegister();
                    }
                break;
                case 'dashboard':
                    return $controllers['user']->dashboard();
                    break;
                
            default:
                list($controllerName, $functionName) = explode('/', $route);
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $functionName = $functionName . 'Submit';
                }
                $controller = $controllers[$controllerName];
                return $controller->$functionName();
                break;
        }
    }
}


