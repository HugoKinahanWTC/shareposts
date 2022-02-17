<?php

interface UserRepositoryInterface {

    /*
     * User Register view
     * @return views/register
     */
    public function register();

    /*
     * User Login view
     * @return views/login
     */
    public function login();

    /*
     * User Session creation
     * @return
     */
    public function createUserSession($user);

    /*
     * User Logout
     * Destroy session and redirect to login
     */
    public function logout();
}