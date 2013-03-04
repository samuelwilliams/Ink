<?php
/*
 * This file is part of Ink WordPress Theme.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Badcow\Ink;

class Post
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $author;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var \DateTime
     */
    protected $gmtDate;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $excerpt;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $commentStatus;

    /**
     * @var string
     */
    protected $pingStatus;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $toPing;

    /**
     * @var string
     */
    protected $pinged;

    /**
     * @var \DateTime
     */
    protected $modified;

    /**
     * @var \DateTime
     */
    protected $gmtModified;

    /**
     * @var string
     */
    protected $contentFiltered;

    /**
     * @var integer
     */
    protected $parent_id;

    /**
     * @var string
     */
    protected $guid;

    /**
     * @var integer
     */
    protected $menuOrder;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var string
     */
    protected $commentCount;

    /**
     * @var string
     */
    protected $filter;

    /**
     * @var string
     */
    protected $permalink;

    /**
     * @var array
     */
    protected $customFields = array();

    /**
     * @var array
     */
    protected $categories = array();

    /**
     * @param object $post
     */
    public function __construct( $post)
    {
        $this->id = $post->ID;
        $this->author = $post->post_author;
        $this->date = \DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date);
        $this->gmtDate = \DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date_gmt);
        $this->content = $post->post_content;
        $this->title = $post->post_title;
        $this->excerpt = $post->post_excerpt;
        $this->status = $post->post_status;
        $this->commentStatus = $post->comment_status;
        $this->pingStatus = $post->ping_status;
        $this->password = $post->post_password;
        $this->name = $post->post_name;
        $this->toPing = $post->to_ping;
        $this->pinged = $post->pinged;
        $this->modified = \DateTime::createFromFormat('Y-m-d H:i:s', $post->post_modified);
        $this->gmtModified = \DateTime::createFromFormat('Y-m-d H:i:s', $post->post_modified_gmt);
        $this->contentFiltered = $post->post_content_filtered;
        $this->parent_id = $post->post_parent;
        $this->guid = $post->guid;
        $this->menuOrder = $post->menu_order;
        $this->type = $post->post_type;
        $this->mimeType = $post->mime_type;
        $this->commentCount = $post->comment_count;
        $this->filter = $post->filter;
        $this->permalink = get_permalink($this->id);
        $this->customFields = get_post_custom($this->id);
        $this->categories = wp_get_post_categories($this->id);
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
    public function getAuthor()
    {
    	return $this->author;
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
    public function getGmtDate()
    {
    	return $this->gmtDate;
    }

    /**
     * @param bool $addParagraphs
     * @param bool $addLineBreaks
     * @param bool $parseShortcodes
     * @return string
     */
    public function getContent($addParagraphs = true, $addLineBreaks = true, $parseShortcodes = true)
    {
        $content = $this->content;

        if($addParagraphs) {
            $content = wpautop($content, $addLineBreaks);
        }

        if($parseShortcodes) {
            $content = do_shortcode($content);
        }

        return $content;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
    	return $this->title;
    }

    /**
     * @param bool $addParagraphs
     * @param bool $addLineBreaks
     * @param bool $parseShortcodes
     * @return string
     */
    public function getExcerpt($addParagraphs = true, $addLineBreaks = true, $parseShortcodes = true)
    {
        $excerpt = $this->excerpt;

        if($addParagraphs) {
            $excerpt = wpautop($excerpt, $addLineBreaks);
        }

        if($parseShortcodes) {
            $excerpt = do_shortcode($excerpt);
        }

        return $excerpt;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
    	return $this->status;
    }

    /**
     * @return string
     */
    public function getCommentStatus()
    {
    	return $this->commentStatus;
    }

    /**
     * @return string
     */
    public function getPingStatus()
    {
    	return $this->pingStatus;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
    	return $this->password;
    }

    /**
     * @return string
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * @return string
     */
    public function getToPing()
    {
    	return $this->toPing;
    }

    /**
     * @return string
     */
    public function getPinged()
    {
    	return $this->pinged;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
    	return $this->modified;
    }

    /**
     * @return \DateTime
     */
    public function getGmtModified()
    {
    	return $this->gmtModified;
    }

    /**
     * @return string
     */
    public function getContentFiltered()
    {
    	return $this->contentFiltered;
    }

    /**
     * @return int
     */
    public function getParent_id()
    {
    	return $this->parent_id;
    }

    /**
     * @return string
     */
    public function getGuid()
    {
    	return $this->guid;
    }

    /**
     * @return int
     */
    public function getMenuOrder()
    {
    	return $this->menuOrder;
    }

    /**
     * @return string
     */
    public function getType()
    {
    	return $this->type;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
    	return $this->mimeType;
    }

    /**
     * @return string
     */
    public function getCommentCount()
    {
    	return $this->commentCount;
    }

    /**
     * @return string
     */
    public function getFilter()
    {
    	return $this->filter;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Returns an associative array of field
     * types and content
     *
     * @return array
     */
    public function getAllCustomFields()
    {
        return $this->customFields;
    }

    /**
     * Returns values associated with particular
     * custom field
     *
     * @param string $field
     * @return array
     */
    public function getCustomFields($field)
    {
        if(!array_key_exists($field, $this->customFields)) {
            return array();
        }

        return $this->customFields[$field];
    }

    /**
     * Returns the first value of
     * a particular custom field
     *
     * @param string $field
     * @return string
     */
    public function getField($field)
    {
        if(!array_key_exists($field, $this->customFields)) {
            return '';
        }

        return $this->customFields[$field][0];
    }

    /**
     * @deprecated Use Post::getField() instead
     * @param $field
     * @return string
     */
    public function getSingleCustomField($field)
    {
        return $this->getField($field);
    }

    /**
     * @return post|null
     */
    public function getParent()
    {
        if(0 == $this->parent_id) {
            return null;
        } else {
            $parent = wp_get_single_post($this->parent_id, OBJECT);
            return new self($parent);
        }
    }

    /**
     * @param string $size
     * @param array $attributes
     * @return mixed|void
     */
    public function renderThumbnail($size = 'post-thumbnail', $attributes = array())
    {
        return get_the_post_thumbnail($this->id, $size, $attributes);
    }

    /**
     * Get the thumbnail URL
     *
     * @param string $size
     * @return bool|string
     */
    public function getThumbnailUrl($size = 'post-thumbnail')
    {
        $attachment_id = get_post_thumbnail_id($this->id);
        $url = wp_get_attachment_image_src($attachment_id, $size);

        return $url?$url[0]:false;
    }

    /**
     * Return an array of categories
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Check if post is in a particular category
     *
     * @param string|int $identifier
     * @return bool
     */
    public function inCategory($identifier)
    {
        if (!is_int($identifier)) {
            $identifier = get_cat_ID($identifier);
        }

        return in_array($identifier, $this->categories);
    }
}