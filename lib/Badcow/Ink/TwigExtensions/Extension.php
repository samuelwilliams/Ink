<?php
/*
 * This file is part of Ink WordPress Theme.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Badcow\Ink\TwigExtensions;

use Badcow\Ink\Post as InkPost;
use Badcow\Ink\Site;

class Extension extends \Twig_Extension
{
    const NAME = 'ink';

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('dump', array($this, 'dump')),
            new \Twig_SimpleFilter('shortcode', 'do_shortcode')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('queryPosts', array('Badcow\Ink\Query', 'query')),
            new \Twig_SimpleFunction('renderSidebar', array($this, 'renderSidebar')),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getGlobals()
    {
        return array(
            'site' => new Site,
        );
    }

    /**
     * Alias for var_dump()
     *
     * @param $object
     * @return string
     */
    public function dump($object)
    {
        ob_start();
        var_dump($object);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param $index
     * @return string
     */
    public function renderSidebar($index)
    {
        return Site::buffer('dynamic_sidebar', array($index));
    }
}