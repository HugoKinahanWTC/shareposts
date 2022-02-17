<?php

interface PageRepositoryInterface {

    /*
     * Pages Index view
     * @return view
     */
    public function index();

    /*
     * Pages About view
     * @return view
     */
    public function about();
}