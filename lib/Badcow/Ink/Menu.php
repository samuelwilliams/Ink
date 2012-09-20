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

class Menu
{
    /**
     * @param array $menus The menus to register
     */
    public function __construct($menus = array())
    {
        register_nav_menus($menus);
    }

    /**
     * Render a navigation menu
     * @param array $args
     * @return bool|mixed|string|void
     */
    public function render(array $args)
    {
        if (!array_key_exists('echo', $args)) {
            $args['echo'] = false;
        }

        return wp_nav_menu($args);
    }
}