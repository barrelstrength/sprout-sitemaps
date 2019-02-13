<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\web\twig\variables;

use barrelstrength\sproutsitemaps\helpers\OptimizeHelper;
use barrelstrength\sproutsitemaps\models\Settings;
use barrelstrength\sproutsitemaps\SproutSitemaps;
use Craft;
use craft\base\Field;
use craft\elements\Asset;

use craft\models\Site;
use DateTime;
use craft\fields\PlainText;
use craft\fields\Assets;

/**
 * Class SproutSeoVariable
 *
 * @package Craft
 */
class SproutSeoVariable
{
    /**
     * @var SproutSitemap
     */
    protected $plugin;

    /**
     * SproutSeoVariable constructor.
     */
    public function __construct()
    {
        $this->plugin = Craft::$app->plugins->getPlugin('sprout-sitemaps');
    }

    /**
     * @return \craft\base\Model|null
     */
    public function getSettings()
    {
        return Craft::$app->plugins->getPlugin('sprout-sitemaps')->getSettings();
    }

    /**
     * @param $id
     *
     * @return \craft\base\ElementInterface|null
     */
    public function getElementById($id)
    {
        $element = Craft::$app->elements->getElementById($id);

        return $element != null ? $element : null;
    }

    /**
     * @param $string
     *
     * @return DateTime
     */
    public function getDate($string)
    {
        return new DateTime($string['date'], new \DateTimeZone(Craft::$app->getTimeZone()));
    }

    /**
     * @return mixed
     */
    public function getSiteIds()
    {
        $sites = Craft::$app->getSites()->getAllSites();

        return $sites;
    }

    /**
     * @param null $uri
     *
     * @return bool
     */
    public function uriHasTags($uri = null)
    {
        if (strstr($uri, '{{')) {
            return true;
        }

        if (strstr($uri, '{%')) {
            return true;
        }

        return false;
    }
}
