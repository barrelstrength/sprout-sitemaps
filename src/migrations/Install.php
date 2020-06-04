<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\migrations;

use barrelstrength\sproutbase\migrations\Install as SproutBaseInstall;
use barrelstrength\sproutbase\SproutBase;
use barrelstrength\sproutbase\app\sitemaps\migrations\Install as SproutBaseSitemapsInstall;
use barrelstrength\sproutsitemaps\SproutSitemaps;
use craft\db\Migration;
use Throwable;

class Install extends Migration
{
    /**
     * @var string The database driver to use
     */
    public $driver;

    /**
     * @return bool
     * @throws Throwable
     */
    public function safeUp(): bool
    {
        SproutBase::$app->config->runInstallMigrations(SproutSitemaps::getInstance());

        return true;
    }

    /**
     * @return bool
     * @throws Throwable
     */
    public function safeDown(): bool
    {
        SproutBase::$app->config->runUninstallMigrations(SproutSitemaps::getInstance());
    }
}
