<?php
namespace src;
class Routes implements \CSY2028\Routes{
    public function getPage($route){
        require '../dbconnect.php';

        $jobsTable = new \CSY2028\DatabaseTable($pdo, 'job', 'id');
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $usersTable = new \CSY2028\DatabaseTable($pdo, 'user', 'id');

        $controllers = [];
        $controllers['job'] = new \src\Controllers\job($jobsTable);
        $controllers['category'] = new \src\Controllers\Category($categoriesTable);
        $controllers['usercontroller'] = new \src\Controllers\usercontroller($usersTable);

        if($route == ''){
            $page = $controllers['job']->home();
        }
        elseif($route == 'faqs'){
            $page = $controllers['job']->faq();
        }
        elseif($route == 'about'){
            $page = $controllers['job']->about();
        }
        elseif($route == 'it'){
            $page = $controllers['job']->it();
        }
        elseif($route == 'hr'){
            $page = $controllers['job']->hr();
        }
        elseif($route == 'sales'){
            $page = $controllers['job']->sales();
        }
        elseif($route == 'jobs'){
            $page = $controllers['job']->list();
        }
        elseif($route == 'login'){
            
            $page = $controllers['usercontroller']->login();
        }
        elseif($route == 'category'){
            
            $page = $controllers['category']->listcat();
        }
        elseif($route == 'applicants'){
            
            $page = $controllers['usercontroller']->applicantslist();
        }
        elseif($route == 'addjob'){
            
            $page = $controllers['job']->addjob();
        }
        elseif($route == 'editjob'){
            
            $page = $controllers['job']->editjob();
        }
        elseif($route == 'deletejob'){
            
            $page = $controllers['job']->deletejob();
        }
        elseif($route == 'apply'){
            
            $page = $controllers['job']->apply();
        }
        elseif($route == 'editcategory'){
            
            $page = $controllers['category']->edit();
        }
        elseif($route == 'deletecategory'){
            
            $page = $controllers['category']->delete();
        }
        elseif($route == 'addcategory'){
            
            $page = $controllers['category']->add();
        }
        elseif($route == 'register'){
            
            $page = $controllers['usercontroller']->register();
        }
        elseif($route == 'employeeRegister'){
            
            $page = $controllers['usercontroller']->employeeRegister();
        }
        else {
            list($controllerName, $functionName) = explode('/', $route);
            $controller = $controllers[$controllerName];
            $page = $controller->$functionName();
        }
        return $page;

        
    }
}
