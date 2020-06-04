<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps;

use barrelstrength\sproutbase\config\base\SproutCentralInterface;
use barrelstrength\sproutbase\config\configs\CampaignsConfig;
use barrelstrength\sproutbase\config\configs\EmailConfig;
use barrelstrength\sproutbase\config\configs\GeneralConfig;
use barrelstrength\sproutbase\config\configs\ReportsConfig;
use barrelstrength\sproutbase\config\configs\SentEmailConfig;
use barrelstrength\sproutbase\config\configs\SitemapsConfig;
use barrelstrength\sproutbase\SproutBaseHelper;
use Craft;
use craft\base\Plugin;

class SproutSitemaps extends Plugin implements SproutCentralInterface
{
    /**
     * @var string
     */
    public $schemaVersion = '1.0.1';

    public static function getSproutConfigs(): array
    {
        return [
            GeneralConfig::class,
            SitemapsConfig::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        SproutBaseHelper::registerModule();

        Craft::setAlias('@sproutsitemaps', $this->getBasePath());
    }


}
