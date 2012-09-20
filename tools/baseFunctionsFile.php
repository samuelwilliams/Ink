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
require_once(__DIR__ . '/../autoload.php');

use Badcow\Ink\Menu,
    Badcow\Ink\Post,
    Badcow\Ink\Query,
    Badcow\Ink\Site;

//Add theme support
add_theme_support('post-thumbnails');

//Register menus
$menus = array(
    'primary_nav' => 'Primary Navigation'
);

$ink_menu = new Menu($menus);

//Dump variables inside Twig templates using "Dump" filter
function dump($object)
{
    var_dump($object);
}

//Warm-up the Twig environment
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(__DIR__.'/templates/');
$twig = new Twig_Environment($loader);

//Register the twig extensions
$twig->addGlobal('menu', $ink_menu);
$twig->addGlobal('postQuery', new Query());

//Add Twig filters
$twig->addFilter('dump', new Twig_Filter_Function('dump'));

//Instantiate the WordPress wrapper classes
$site = new Site;

//The post class needs to instantiated in the template file