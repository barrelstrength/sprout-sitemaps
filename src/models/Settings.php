<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\models;

use craft\base\Model;

/**
 *
 * @property array $settingsNavItems
 */
class Settings extends Model
{
    /**
     * @var string
     */
    public $pluginNameOverride = '';

    /**
     * @var bool
     */
    public $enableCustomSections = false;

    /**
     * @var bool
     */
    public $enableDynamicSitemaps = true;

    /**
     * @var bool
     */
    public $enableMultilingualSitemaps = false;

    /**
     * @var int
     */
    public $totalElementsPerSitemap = 500;

    /**
     * @var array
     */
    public $siteSettings = [];

    /**
     * @var array
     */
    public $groupSettings = [];
}