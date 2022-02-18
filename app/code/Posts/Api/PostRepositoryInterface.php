<?php

require_once  APPROOT . '/Posts/Model/Post.php';


interface PostRepositoryInterface {

    /*
     * Get Posts
     * @return null|array
     */
    public function getPosts();

    /*
     * Add a PostRepository
     * @return null|bool
     */
    public function addPost(Post $postObj): bool;

    /*
     * Update a PostRepository
     * @return null|bool
     */
    public function updatePost(Post $postObj): bool;

    /*
     * Get single PostRepository by ID
     * @return null|object
     */
    public function getPostById($id): object;

    /*
     * Delete a post
     * @return null|bool
     */
    public function deletePost($id): bool;
}