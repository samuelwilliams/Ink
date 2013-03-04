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
use Badcow\Ink\Post as InkPost;

class Query
{
    /**
     * @var array An array of posts
     */
    protected $posts = array();

    /**
     * @var object
     */
    protected $wpQuery;

    /**
     * @param array|string $query
     * @return array An array of post objects
     * @deprecated Just use the static method
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
     * @param array|string $query
     * @return array<InkPost>
     */
    public static function query($query)
    {
        $posts = array();
        $wpQuery = new \WP_Query($query);

        if (null !== $wpQuery->posts) {
            foreach($wpQuery->posts as $post) {
                $posts[] = new InkPost($post);
            }
        }

        return $posts;
    }

    /**
     * @return \StdClass
     */
    public function getWpQuery()
    {
        return $this->wpQuery;
    }
}
