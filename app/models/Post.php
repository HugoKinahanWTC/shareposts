<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts() {
        $this->db->query('SELECT *, 
                            posts.id as post_id, 
                            users.id as user_id, 
                            posts.created_at as posts_created_at, 
                            users.created_at as users_created_at
                            FROM posts 
                            INNER JOIN users 
                            ON posts.user_id = users.id 
                            ORDER BY posts.created_at DESC');
        $results = $this->db->resultSet();
        return $results;
    }
}
