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
use Badcow\Ink\Post;

class Query
{
    /**
     * @var array An array of posts
     */
    protected $posts = array();

    /**
     * @var \StdClass
     */
    protected $wpQuery;

    /**
     * @param array|string $query
     * @return array An array of post objects
     */
    public function getPosts($query)
    {
        $this->posts = array();

        $this->wpQuery = new \WP_Query($query);

        if (null !== $this->wpQuery->posts) {
            foreach($this->wpQuery->posts as $post) {
                $this->posts[] = new Post($post);
            }
        }

        return $this->posts;
    }

    /**
     * @return \StdClass
     */
    public function getWpQuery()
    {
        return $this->wpQuery;
    }
}
