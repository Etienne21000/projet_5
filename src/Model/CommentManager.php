<?php
namespace App\Model;

class CommentManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function getAllComments($report =-1, $start =-1, $limite=-1)
    {
        $Comments = [];

        $req = 'SELECT c.id, c.user_id, u.identifiant, c.comment,
        DATE_FORMAT(c.comment_date, \'%d/%m/%Y à %Hh%i\')
        AS comment_date FROM comments AS c
        LEFT JOIN user AS u
        ON c.user_id = u.id';

        if($report != -1)
        {
            $req.= ' WHERE c.report = ' . (int) $report . ' ORDER BY c.comment_date';
        }

        if ($start != -1 || $limite != -1)
        {
            $req .= ' LIMIT '.(int) $limite . ' OFFSET ' . (int) $start;
        }

        $result = $this->db->query($req);

        while ($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $comment = new Comment($data);
            $Comments[] = $comment;
        }
        return $Comments;
        //ORDER BY c.comment_date DESC';
    }

    //get comments by serie
    public function getAllCom($id, $start =-1, $limite=-1)
    {
        $Comments = [];

        $req = 'SELECT c.id, c.serie_id, u.identifiant, c.comment,
        DATE_FORMAT(c.comment_date, \'%d/%m/%Y à %Hh%i\')
        AS comment_date FROM comments AS c
        LEFT JOIN user AS u
        ON c.user_id = u.id
        WHERE c.serie_id = :serie_id AND c.report = 0
        ORDER BY c.comment_date DESC';

        if ($start != -1 || $limite != -1)
        {
            $req .= ' LIMIT '.(int)$limite . ' OFFSET ' . (int)$start;
        }

        $result = $this->db->prepare($req);

        $result->bindValue(':serie_id', $id, \PDO::PARAM_INT);

        $result->execute();

        while($data = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $comment = new Comment($data);
            $Comments[] = $comment;
        }

        return $Comments;
    }

    public function reportComment($id)
    {
        $req = $this->db->prepare('UPDATE comments SET report = 1 WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }

    public function validateComment(Comment $comment)
    {
        $req = $this->db->prepare('UPDATE comments SET report = 0
        WHERE id = :id');

        $req->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function AddComment(Comment $comment)
    {
        $req = $this->db->prepare('INSERT INTO comments(user_id, comment, comment_date, serie_id, report)
        VALUES(:user_id, :comment, NOW(), :serie_id, 0)');

        $req->bindValue(':user_id', $comment->user_id(), \PDO::PARAM_INT);
        $req->bindValue(':comment', $comment->comment(), \PDO::PARAM_STR);
        $req->bindValue(':serie_id', $comment->serie_id(), \PDO::PARAM_INT);

        $req->execute();
    }

    public function UpdateComment(Comment $comment)
    {
        $req = $this->db->prepare('UPDATE comments SET comment = :comment, report = 0, edition_date = NOW()
        WHERE id = :id');

        $req->bindValue(':comment', $comment->comment());
        $req->bindValue(':id', $comment->id(), \PDO::PARAM_INT);

        $req->execute();

    }

    public function deleteComment($id)
    {
        $req = $this->db->prepare('DELETE FROM comments WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();
    }

    public function getOneComment($id)
    {
        $req = $this->db->prepare('SELECT id, pseudo, comment, report,
        DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date
        FROM comments WHERE id = :id');

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        $req->execute();

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        $Comment = new Comment($data);

        return $Comment;
    }

    public function countComment($report =-1)
    {
        $req = 'SELECT COUNT(*) FROM comments';

            if($report != -1)
            {
                $req.= ' WHERE report = ' .(int) $report;
            }

            $countCom = $this->db->query($req)->fetchColumn();

            return $countCom;
    }
}
