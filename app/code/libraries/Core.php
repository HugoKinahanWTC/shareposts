<?php
declare(strict_types=1);

/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT -
 * /controller/method/params
 * /products/trousers/1
 */
class Core {
    protected $currentDir = 'pages';
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        //print_r($this->getUrl());

        $url = $this->getUrl();

        // Look in directory for first value
        if(isset($url[0]) && file_exists('../app/code/' . ucwords($url[0]))){
            // If exists, set as controller
            $this->currentDir = ucwords($url[0]);
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        var_dump('values:', $this->currentDir, $this->currentController);

        // Require the controller
        require_once '../app/code/' . $this->currentDir . '/controllers/'.
            $this->currentController . '.php';

        // Instantiate dir class
        $this->currentDir = new $this->currentDir;

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod],
        $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}


///*
// * App Core Class
// * Creates URL & loads core controller
// * URL FORMAT -
// * /controller/method/params
// * /products/trousers/1
// */
//
//class Core
//{
//    protected $currentController = 'Pages';
//    protected $currentMethod = 'index';
//    protected $params = [];
//
//    public function __construct() {
//        //print_r($this->getUrl());
//
//        $url = $this->getUrl();
//
//        // Look in controllers for first value
//        if (isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
//            // If exists, set as controller
//            $this->currentController = ucwords($url[0]);
//            // Unset 0 Index
//            unset($url[0]);
//        }
//
//        // Require the controller
//        require_once '../app/controllers/' . $this->currentController . '.php';
//
//        // Instantiate controller class
//        $this->currentController = new $this->currentController;
//
//        // Check for second part of url
//        if (isset($url[1])) {
//            // Check to see if method exists in controller
//            if (method_exists($this->currentController, $url[1])) {
//                $this->currentMethod = $url[1];
//                // Unset 1 index
//                unset($url[1]);
//            }
//        }
//
//
//        // Get params
//        $this->params = $url ? array_values($url) : [];
//
//        // Call a callback with array of params
//        call_user_func_array([$this->currentController, $this->currentMethod],
//            $this->params);
//    }
//
//    public function getUrl() {
//        if (isset($_GET['url'])) {
//            $url = rtrim($_GET['url'], '/');
//            $url = filter_var($url, FILTER_SANITIZE_URL);
//            $url = explode('/', $url);
//            return $url;
//        }
//    }
//}

