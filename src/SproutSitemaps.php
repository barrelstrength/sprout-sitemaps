<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps;

use barrelstrength\sproutbase\config\base\SproutBasePlugin;
use barrelstrength\sproutbase\config\configs\ControlPanelConfig;
use barrelstrength\sproutbase\config\configs\SitemapsConfig;
use barrelstrength\sproutbase\SproutBaseHelper;
use Craft;

class SproutSitemaps extends SproutBasePlugin
{
    /**
     * @var string
     */
    public $schemaVersion = '1.0.1';

    /**
     * @var string
     */
    public $minVersionRequired = '1.3.0';

    public static function getSproutConfigs(): array
    {
        return [
            SitemapsConfig::class
        ];
    }

    public function init()
    {
        parent::init();

        SproutBaseHelper::registerModule();

        Craft::setAlias('@sproutsitemaps', $this->getBasePath());
    }
}
