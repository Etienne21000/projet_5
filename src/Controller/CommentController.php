<?php
namespace App\Controller;

use App\Model\CommentManager;
use App\Model\Comment;

class CommentController
{
    private $comment;

    public function __construct()
    {
        $this->comment = new CommentManager();
    }

    public function addCom($user_id, $comment, $serie_id)
    {
        $Comment = new Comment([$data]);

        $Comment->setUserid($user_id);
        $Comment->setComment($comment);
        $Comment->setSerieid($serie_id);

        $this->comment->AddComment($Comment);
    }

    public function allCom($id)
    {
        $Comments = $this->comment->getAllCom($id, $start = 0, $limite = 5);

        return $Comments;
    }

    public function getAllComments()
    {
        $Comments = $this->comment->getAllComments($report = 0);

        return $Comments;
    }

    public function getAllC()
    {
        $Comments = $this->comment->getAllComments($report = 0, $start = 0, $limite = 3);

        return $Comments;
    }

    public function getAllReportedComments()
    {
        $Reported = $this->comment->getAllComments($report = 1);

        return $Reported;
    }

    public function allComAdmin($id)
    {
        $Comments = $this->comment->getAllCom($id);

        return $Comments;
    }

    public function lastCom()
    {
        $Comments = $this->comment->getAllCom($start = 0, $limite = 4);

        return $Comments;
    }

    public function reportCom($id)
    {
        $ReportedCom = $this->comment->reportComment($id);

        return $ReportedCom;
    }

    public function validateCom($id)
    {
        $Comment = new Comment([$data]);

        $Comment->setId($id);

        $this->comment->validateComment($Comment);
    }

    public function deleteCom($id)
    {
        $Comments = $this->comment->deleteComment($id);
    }

    public function getOneCom($id)
    {
        $Comment = $this->comment->getOneComment($id);

        return $Comment;
    }

    public function countCom()
    {
        $countCom = $this->comment->countComment($report = 0);

        return $countCom;
    }

    public function reportedCom()
    {
        $reportedCom = $this->comment->countComment($report = 1);

        return $reportedCom;
    }
}
