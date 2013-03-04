<?php
/*
 * This file is part of Ink WordPress Theme.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//Load the required libraries
require_once __DIR__ . '/vendor/autoload.php';

$twig = require __DIR__ . '/twig.php';

//Add theme support
add_theme_support('post-thumbnails');

//Register menus
$menus = array(
    'primary_nav' => 'Primary Navigation',
);

$ink_menu = new Badcow\Ink\Menu($menus);

//Register the twig extensions
$twig->addGlobal('menu', $ink_menu);