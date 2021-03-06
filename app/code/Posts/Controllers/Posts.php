<?php
//declare(strict_types=1);

require_once APPROOT . '/Posts/Model/Post.php';
require_once  APPROOT . '/Posts/Model/PostRepository.php';

class Posts extends Controller {


    public function __construct() {
        if (!isLoggedIn()) {
            redirect('posts/login');
        }

       $this->postModel = $this->model('posts','PostRepository');
        $this->userModel = $this->model('users', 'User');
    }

    public function index() {

        // Get posts

        $posts = $this->postModel->getPosts();

        (array) $data = [
            'posts' => $posts
        ];

        $this->view('posts','index', $data);


    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            (array) $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            // Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter a title.';
            }

            // Validate body
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter the body text.';
            }

            // Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {

                // Instantiate new Post Object
                $postObj = new Post();

                $postObj->setTitle(trim($_POST['title']));
                $postObj->setBody(trim($_POST['body']));
                $postObj->setUserId(trim($_SESSION['user_id']));

                $postRepository = new PostRepository();

                $postRepository->addPost($postObj);

                // Validated
                if ($this->postModel->addPost($postObj)) {
                    flash('post_message', 'Posts added successfully.');
                    redirect('posts');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load view with errors
                $this->view('posts','add', $data);
            }

        } else {
            (array) $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('posts', 'add', $data);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            // Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter a title.';
            }

            // Validate body
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter the body text.';
            }

            // Instantiate new Post Object
            $postObj = new Post();

            $postObj->setTitle(trim($_POST['title']));
            $postObj->setBody(trim($_POST['body']));
            $postObj->setId($id);

            $postRepository = new PostRepository();

            $postRepository->updatePost($postObj);

            // Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {
                // Validated
                if ($this->postModel->updatePost($postObj)) {
                    flash('post_message', 'Posts updated successfully.');
                    redirect('posts');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load view with errors
                $this->view('posts', 'edit', $data);
            }
        } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }


            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];

            $this->view('posts','edit', $data);
        }
    }

    public function show($id) {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts', 'show', $data);
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Posts successfully deleted.');
                redirect('posts');
            } else {
                die('Something went wrong.');
            }
        } else {
            redirect('posts');
        }
    }

}
