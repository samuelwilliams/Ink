<?php

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates/');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__ . '/.twig-cache',
    'auto_reload' => true,
    'strict_variables' => true,
));

//Register the twig extensions
$twig->addExtension(new \Badcow\Ink\TwigExtensions\Extension);
$twig->addExtension(new Twig_Extension_Escaper(false));

return $twig;