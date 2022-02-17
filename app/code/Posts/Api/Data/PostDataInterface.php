<?php

interface PostDataInterface {

    /*
     * Get Posts
     * @return null|array
     */
    public function getPosts();

    /*
     * Add a Post
     * @return null|bool
     */
    public function addPost($data): bool;

    /*
     * Update a Post
     * @return null|bool
     */
    public function updatePost($data): bool;

    /*
     * Get single Post by ID
     * @return null|object
     */
    public function getPostById($id): object;

    /*
     * Delete a post
     * @return null|bool
     */
    public function deletePost($id): bool;

}