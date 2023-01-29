<?php
namespace CSY2028;
class EntryPoint {

    
        private $routes;
        private $loggedIn = false;
    
        public function __construct($routes){
            $this->routes = $routes;
        }
    
        public function run(){
            session_start();
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
                $this->loggedIn = true;
            }
            $route = ltrim(explode('?',  $_SERVER['REQUEST_URI'])[0], '/');
            $page = $this->routes->getPage($route);
            if (!$this->loggedIn && (array_key_exists('restricted', $page) && $page['restricted'] === true)) {
                header("Location: /403.php");
                exit();
            }
            $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
            $title = $page['title'];
            require '../templates/layout.html.php';
        }
        public function loadTemplate($fileName, $templateVars){
            extract($templateVars);
            ob_start();
            require $fileName;
            $contents = ob_get_clean();
            return $contents;   
        }
    }
    