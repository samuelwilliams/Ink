<?php
/*
 * This file is part of Ink WordPress Theme.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName = __DIR__.'/lib/';

    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    if (!file_exists($fileName)) {
        return;
    }

    require $fileName;
}

//Register the Ink autoloader
spl_autoload_register('autoload');

//Require the Twig autoloader
require_once(__DIR__.'/lib/vendor/Twig/lib/Twig/Autoloader.php');

//Warm-up the Twig environment
Twig_Autoloader::register();