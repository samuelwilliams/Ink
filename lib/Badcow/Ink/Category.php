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

class Category
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $parent;

    /**
     * @var integer
     */
    protected $count;

    /**
     * @var string
     */
    protected $permalink;

    /**
     * @param string|int $identifier
     * @return category
     */
    public function setCategory($identifier)
    {
        if (is_integer($identifier)) {
            $this->id = $identifier;
        } else {
            $this->id = get_cat_ID($identifier);
        }

        $c = get_category($this->id);

        $this->name = $c->name;
        $this->slug = $c->slug;
        $this->description = $c->description;
        $this->parent = $c->parent;
        $this->count = $c->count;
        $this->permalink = get_category_link($this->id);

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @static
     * @param $id
     * @return string
     */
    public static function getCategoryPermalink($id)
    {
        $category = new self;
        $category->setCategory($id);

        return $category->getPermalink();
    }
}