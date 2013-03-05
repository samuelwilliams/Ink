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

class Site
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $siteUrl;

    /**
     * @var string
     */
    protected $adminEmail;

    /**
     * @var string
     */
    protected $charset;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $htmlType;

    /**
     * @var string
     */
    protected $textDirection;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $stylesheetUrl;

    /**
     * @var string
     */
    protected $stylesheetDirectory;

    /**
     * @var string
     */
    protected $templateUrl;

    /**
     * @var string
     */
    protected $pingbackUrl;

    /**
     * @var string
     */
    protected $atomUrl;

    /**
     * @var string
     */
    protected $rdfUrl;

    /**
     * @var string
     */
    protected $rssUrl;

    /**
     * @var string
     */
    protected $rss2Url;

    /**
     * @var string
     */
    protected $commentsAtomUrl;

    /**
     * @var string
     */
    protected $commentsRss2Url;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->name = get_bloginfo('name', 'raw');
        $this->description = get_bloginfo('description', 'raw');
        $this->siteUrl = home_url();
        $this->adminEmail = get_bloginfo('admin_email', 'raw');
        $this->charset = get_bloginfo('charset', 'raw');
        $this->version = get_bloginfo('version', 'raw');
        $this->htmlType = get_bloginfo('html_type', 'raw');
        $this->textDirection = get_bloginfo('text_direction', 'raw');
        $this->language = get_bloginfo('language', 'raw');
        $this->stylesheetUrl = get_bloginfo('stylesheet_url', 'raw');
        $this->stylesheetDirectory = get_bloginfo('stylesheet_directory', 'raw');
        $this->templateUrl = get_bloginfo('template_url', 'raw');
        $this->pingbackUrl = get_bloginfo('pingback_url', 'raw');
        $this->atomUrl = get_bloginfo('atom_url', 'raw');
        $this->rdfUrl = get_bloginfo('rdf_url', 'raw');
        $this->rssUrl = get_bloginfo('rss_url', 'raw');
        $this->rss2Url = get_bloginfo('rss2_url', 'raw');
        $this->commentsAtomUrl = get_bloginfo('comments_atom_url', 'raw');
        $this->commentsRss2Url = get_bloginfo('comments_rss2_url', 'raw');
    }

    /**
     * @return string|void
     */
    public function getName()
    {
    	return $this->name;
    }

    /**
     * @return string|void
     */
    public function getDescription()
    {
    	return $this->description;
    }

    /**
     * @return string|void
     */
    public function getSiteUrl()
    {
    	return $this->siteUrl;
    }

    /**
     * @return string|void
     */
    public function getAdminEmail()
    {
    	return $this->adminEmail;
    }

    /**
     * @return string|void
     */
    public function getCharset()
    {
    	return $this->charset;
    }

    /**
     * @return string|void
     */
    public function getVersion()
    {
    	return $this->version;
    }

    /**
     * @return string|void
     */
    public function getHtmlType()
    {
    	return $this->htmlType;
    }

    /**
     * @return string|void
     */
    public function getTextDirection()
    {
    	return $this->textDirection;
    }

    /**
     * @return string|void
     */
    public function getLanguage()
    {
    	return $this->language;
    }

    /**
     * @return string|void
     */
    public function getStylesheetUrl()
    {
    	return $this->stylesheetUrl;
    }

    /**
     * @return string|void
     */
    public function getStylesheetDirectory()
    {
    	return $this->stylesheetDirectory;
    }

    /**
     * @return string|void
     */
    public function getTemplateUrl()
    {
    	return $this->templateUrl;
    }

    /**
     * @return string|void
     */
    public function getPingbackUrl()
    {
    	return $this->pingbackUrl;
    }

    /**
     * @return string|void
     */
    public function getAtomUrl()
    {
    	return $this->atomUrl;
    }

    /**
     * @return string|void
     */
    public function getRdfUrl()
    {
    	return $this->rdfUrl;
    }

    /**
     * @return string|void
     */
    public function getRssUrl()
    {
    	return $this->rssUrl;
    }

    /**
     * @return string|void
     */
    public function getRss2Url()
    {
    	return $this->rss2Url;
    }

    /**
     * @return string|void
     */
    public function getCommentsAtomUrl()
    {
    	return $this->commentsAtomUrl;
    }

    /**
     * @return string|void
     */
    public function getCommentsRss2Url()
    {
    	return $this->commentsRss2Url;
    }

    /**
     * Render the WordPress footer scripts
     *
     * @return string
     */
    public function getWpFooter()
    {
        return self::buffer('wp_footer');
    }

    /**
     * Render WordPress header scripts
     *
     * @return string
     */
    public function getWpHeader()
    {
        return self::buffer('wp_head');
    }

    /**
     * Buffers output of callback
     *
     * @param callable $callback
     * @param array $args
     * @return string
     * @throws \ErrorException
     */
    public static function buffer($callback, array $args = array())
    {
        if (!is_callable($callback)) {
            throw new \ErrorException('Callback must be callable.');
        }

        ob_start();
        call_user_func_array($callback, $args);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}