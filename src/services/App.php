<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\services;

use craft\base\Component;

class App extends Component
{
    /**
     * @var Sitemaps
     */
    public $sitemaps;

    /**
     * @var XmlSitemap
     */
    public $xmlSitemap;

    /**
     * @var UrlEnabledSections
     */
    public $urlEnabledSections;

    /**
     * @var Settings
     */
    public $settings;

    public function init()
    {;
        $this->sitemaps = new Sitemaps();
        $this->xmlSitemap = new XmlSitemap();
        $this->urlEnabledSections = new UrlEnabledSections();
        $this->settings = new Settings();
    }
}