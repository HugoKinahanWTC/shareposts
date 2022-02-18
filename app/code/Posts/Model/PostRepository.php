<?php

declare(strict_types=1);

require_once  APPROOT . '/Posts/Api/PostRepositoryInterface.php';

class PostRepository implements PostRepositoryInterface {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getPosts(): array {
        $this->db->query('SELECT *, 
                            posts.id as post_id, 
                            users.id as user_id 
                            FROM posts 
                            INNER JOIN users 
                            ON posts.user_id = users.id 
                            ORDER BY posts.created_at DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addPost(Post $postObj): bool {

        $this->db->query('INSERT INTO posts (title, user_id, body) 
                        VALUES (:title, :user_id, :body)');
        // Bind values
        $this->db->bind(':title', $postObj->getTitle());
        $this->db->bind(':user_id', $postObj->getUserId());
        $this->db->bind(':body', $postObj->getBody());
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost(Post $postObj): bool {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id;');
        // Bind values
        $this->db->bind(':title', $postObj->getTitle());
        $this->db->bind(':id', $postObj->getId());
        $this->db->bind(':body', $postObj->getBody());
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id): object {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function deletePost($id): bool {
        $this->db->query('DELETE from posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


}
