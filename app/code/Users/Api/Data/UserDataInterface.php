<?php

interface UserDataInterface {

    /*
     * Register User
     * @return null|bool
     */
    public function register($data): bool;

    /*
     * Login User
     * @return null|object
     */
    public function login(string $email, string $password): object;

    /*
     * Find User by Email
     * @return null|bool
     */
    public function findUserByEmail(string $email): bool;

    /*
     * Get User by Id
     * @return null|bool
     */
    public function getUserById(string $email): bool;
}