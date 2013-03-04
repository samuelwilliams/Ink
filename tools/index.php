<?php
/**
 *
 * @var $post object
 * @var $site Badcow\Ink\Site
 * @var $twig Twig_Environment
 */

$inkPost = new \Badcow\Ink\Post($post);

echo $twig->render('index.html.twig', array('post' => $inkPost));