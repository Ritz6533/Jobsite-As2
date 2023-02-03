<?php
namespace CSY2028;
class EntryPoint {

    
        private $routes;
        private $loggedin = false;
    
        public function __construct($routes){
            $this->routes = $routes;
        }
    
        public function run(){
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                $this->loggedin = true;
            }
            $route = ltrim(explode('?',  $_SERVER['REQUEST_URI'])[0], '/');
            $page = $this->routes->getPage($route);
            if (!$this->loggedin && (array_key_exists('restricted', $page) && $page['restricted'] === true)) {
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
    