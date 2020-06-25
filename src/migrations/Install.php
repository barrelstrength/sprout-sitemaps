<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\migrations;

use barrelstrength\sproutbase\SproutBase;
use barrelstrength\sproutsitemaps\SproutSitemaps;
use craft\db\Migration;
use Throwable;

class Install extends Migration
{
    /**
     * @return bool
     * @throws Throwable
     */
    public function safeUp(): bool
    {
        SproutBase::$app->config->runInstallMigrations(SproutSitemaps::getInstance());
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
