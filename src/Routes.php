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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['category']->deletecategory();
                }
                    else  {
                        return $controllers['category']->listcat();
                    }
                break;
            case 'applicants':
                return $controllers['user']->applicantslist();
                break;
            case 'addjob':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['job']->addjobsubmit();
                }
                    else  {
                        return $controllers['category']->addjob();
                    }
                return $controllers['job']->addjob();
                break;
            case 'editjob':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['job']->editjobsubmit();
                }
                    else  {
                        return $controllers['job']->editjob();
                    }
                break;
            case 'joblist':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['job']->joblistsubmit();
                }
                    else  {
                        return $controllers['job']->joblist();
                    }
                break;
            case 'apply':
                return $controllers['job']->apply();
                break;
            case 'editcategory':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['category']->editcategorysubmit();
                }
                    else  {
                        return $controllers['category']->editcategory();
                    }
                break;
           

            case 'addcategory':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    return $controllers['category']->addcategorysubmit();
                }
                    else  {
                        return $controllers['category']->addcategory();
                    }
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
                case 'viewjob':
                        return $controllers['job']->viewjob();
                        break;
                case 'enquiry':
                            return $controllers['enquiries']->enquiries();
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


/*switch ($_GET['case']) {
    case 'deletejob':
        case 'deleteclass':*/