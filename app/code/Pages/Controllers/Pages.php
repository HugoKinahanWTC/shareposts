<?php

declare(strict_types=1);

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {

        (array) $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network built on the MVC PHP framework.'
        ];
        $this->view('pages', 'index', $data);

    }

    public function about() {
        (array) $data = [
            'title' => 'About Us',
            'description' => 'App to share views with other views.'

        ];
        $this->view('pages','about', $data);
    }

}