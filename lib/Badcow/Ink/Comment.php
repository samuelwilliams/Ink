<?php

namespace Badcow\Ink;

class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Post
     */
    private $post;

    /**
     * @var string
     */
    private $authorName;

    /**
     * @var string
     */
    private $authorEmail;

    /**
     * @var string
     */
    private $authorUrl;

    /**
     * @var string
     */
    private $authorIp;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $dateGmt;

    /**
     * @var string
     */
    private $content;

    /**
     * @var int
     */
    private $karma;

    /**
     * @var bool
     */
    private $approved;

    /**
     * @var string
     */
    private $agent;

    /**
     * @var string
     */
    private $type;

    /**
     * @var comment
     */
    private $parent;

    /**
     * @var int
     */
    private $userId;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $comment = get_comment($id);

        if (is_null($comment)) {
            return;
        }

        $this->id = $comment->comment_ID;
        $this->post = new Post(\get_post($comment->comment_post_ID));
        $this->authorName = $comment->comment_author;
        $this->authorEmail = $comment->comment_author_email;
        $this->authorUrl = $comment->comment_author_url;
        $this->authorIp = $comment->comment_author_IP;
        $this->date = \DateTime::createFromFormat('Y-m-d H:i:s', $comment->comment_date);
        $this->dateGmt = \DateTime::createFromFormat('Y-m-d H:i:s', $comment->comment_date_gmt);
        $this->content = $comment->comment_content;
        $this->karma = $comment->comment_karma;
        $this->approved = $comment->comment_approved;
        $this->agent = $comment->comment_agent;
        $this->type = $comment->comment_type;
        $this->parent = new self($comment->comment_parent);
        $this->userId = $comment->user_id;
    }

    /**
     * @return string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @return string
     */
    public function getAuthorIp()
    {
        return $this->authorIp;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return string
     */
    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return \DateTime
     */
    public function getDateGmt()
    {
        return $this->dateGmt;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getKarma()
    {
        return $this->karma;
    }

    /**
     * @return Comment
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @static
     * @param mixed $args
     * @return array
     */
    public static function getComments($args)
    {
        $returnArray = array();
        $comments = \get_comments($args);

        foreach ($comments as $comment) {
            $returnArray[] = new self($comment->comment_ID);
        }

        return $returnArray;
    }
}