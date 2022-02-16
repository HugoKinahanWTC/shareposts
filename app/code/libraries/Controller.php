<?php

declare(strict_types=1);

/*
 * Base Controller
 * Loads the Models and Views
*/

class Controller {
    // Load model
    public function model($dir, $model) {
        // Require model file
        require_once '../app/code/' . $dir . '/model/' . $model . '.php';
        // Instantiate the model
        return new $model();
    }

    // Load View
    public function view($dir, $view, $data = []) {
        // Check for view file
        if (file_exists('../app/code/' . $dir . '/views/' . $view . '.php')) {
            require_once '../app/code/' . $dir . '/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist.');
        }
    }
}