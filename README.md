#Ink WordPress Starter Theme

##What is *Ink*?
Ink is a WordPress starter theme that harnesses the power of the [Twig template engine](http://twig.sensiolabs.org/) to
build readable WordPress templates.

##Why *Ink*?
First, and foremost, **PHP is not a template engine!** If you would like to disagree, please
[read this blog](http://fabien.potencier.org/article/34/templating-engines-in-php) before arguing.

>"If you think PHP is still a template language, can you give me just one recent change in the PHP language which
enhanced PHP as a template language? I cannot think of one."

PHP is a dynamic language that started its life as a template engine, but has grown into a powerful,
community-orientated language. PHP is no longer a templating language. Smarty, Django, HAML and Twig *are* templating
languages.

##If you decide to use Ink, you are not stuck with Twig.
This is, by no means, and exhaustive replacement for traditional WordPress templates. If there is something that Ink
cannot (yet) do that PHP does, you can still use a normal template file.

##Installing Ink
In your base WordPress directory:

    $ git clone git@github.com:samuelwilliams/Ink.git Ink/

##Compare Twig to PHP
Below we will compare two files that both achieve the same thing; they both render a page and list other pages. The
first example uses Twig, the second uses PHP.

###Twig syntax

    {% extends 'base.html.twig' %}
    
    {% block content %}
    <section>
        <h1>{{ post.title }}</h1>
        <em>{{ post.date.format('d/m/Y') }}</em><br />
        {{ post.content }}
    
        <h1>List of posts</h1>
    
        {% set posts = postQuery.getPosts('post_type=page') %}
    
        {%for posty in posts %}
            <h2>{{posty.title}}</h2>
            {{posty.content | raw}}
            <hr />
        {% else %}
            <em>There are no posts to be displayed, sorry.</em>
        {% endfor %}
    
    </section>
    {% endblock %}

###PHP syntax

    <?php get_header(); ?>
    
    <section>
        <h1><?php the_title(); ?></h1>
    
        <?php the_date('d/m/Y', '<em>', '</em>'); ?><br />
    
        <?php the_content(); ?>
    
        <h1>List of posts</h1>
    
        <?php
            $posts = new WP_Query('post_type=page');
            if($posts->have_posts()):
                while($posts->have_posts()): $posts->the_post();
        ?>
    
                    <h2><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                    <hr />
                <?php endwhile; ?>
            <?php else: ?>
                <em>There are no posts to be displayed, sorry.</em>
            <?php endif; ?>
    
    </section>
    
    <?php get_footer(); ?>

The advantage of Twig is that the syntax is more fluid and is closer to HTML than to PHP. In templating using PHP, it
becomes a monstrous task to keep track of all the loop beginnings and endings.