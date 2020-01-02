<?php
namespace App\Model;

// use App\Model\Post;

/**
*
*/
class PostManager extends Manager
{
    function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function addPost(Post $post)
    {
        $req = $this->db->prepare('INSERT INTO post(title, content, slug, creation_date)
        VALUES(:title, :content, :slug, NOW())');

        $req->bindValue(':title', $post->title());
        $req->bindValue(':content', $post->content());
        $req->bindValue(':slug', $post->slug());

        $req->execute();
    }

    public function updatePost(Post $post)
    {
        $req = $this->db->prepare('UPDATE post SET title = :title, content = :content
        WHERE id = :id');

        $req->bindValue(':title', $post->title());
        $req->bindValue(':content', $post->content());
        $req->bindValue(':id', $post->id(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function getOnePost($id)
    {
        $req = $this->db->prepare('SELECT id, title, content, slug
        FROM post WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $post = new Post($data);

        return $post;
    }

    public function getAll($start =-1, $limite =-1)
    {
        $Posts = [];

        $req = 'SELECT id, title, content, slug,
        DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date
        FROM post ORDER BY creation_date';

        if ($start != -1 || $limite != -1)
        {
            $req .= ' LIMIT '. (int) $limite .' OFFSET ' . (int) $start;
        }

        $result = $this->db->prepare($req);

        $result->execute();

        while ($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $post = new Post($data);
            $Posts[] = $post;
        }

        return $Posts;
    }

    public function countPosts()
    {
        $countPost = $this->db->query('SELECT COUNT(*) FROM post')->fetchColumn();

        return $countPost;
    }

    public function deletePost($id)
    {
        $req = $this->db->prepare('DELETE FROM post WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }
}
