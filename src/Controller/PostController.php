<?php
namespace App\Controller;

use App\Model\PostManager;
use App\Model\Post;

class PostController
{
    private $post;

    function __construct()
    {
        $this->post = new PostManager();
    }

    public function createPost($title, $content, $slug)
    {
        $Post = new Post([$data]);

        $Post->setTitle($title);
        $Post->setContent($content);
        $Post->setSlug($slug);

        $this->post->addPost($Post);
    }

    public function update($id, $title, $content)
    {
        $Post = new Post([$data]);

        $Post->setId($id);
        $Post->setTitle($title);
        $Post->setContent($content);

        $this->post->updatePost($Post);
    }

    public function getPost($id)
    {
        $post = $this->post->getOnePost($id);

        return $post;
    }

    public function getPostAdmin()
    {
        $Posts = $this->post->getAll($start = 0, $limite = 3);

        return $Posts;
    }

    public function getAllPost()
    {
        $Posts = $this->post->getAll();

        return $Posts;
    }

    public function nbPosts()
    {
        $countPost = $this->post->countPosts();

        return $countPost;
    }

    public function deleteP($id)
    {
        $post = $this->post->deletePost($id);
    }
}
