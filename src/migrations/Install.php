<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\migrations;

use barrelstrength\sproutbasesitemaps\migrations\Install as SproutBaseSitemapsInstall;
use barrelstrength\sproutbase\migrations\Install as SproutBaseInstall;
use craft\db\Migration;

class Install extends Migration
{
    /**
     * @var string The database driver to use
     */
    public $driver;

    /**
     * @return bool
     * @throws \Throwable
     * @throws \craft\errors\SiteNotFoundException
     */
    public function safeUp(): bool
    {
        $migration = new SproutBaseInstall();
        ob_start();
        $migration->safeUp();
        ob_end_clean();

        $migration = new SproutBaseSitemapsInstall();
        ob_start();
        $migration->safeUp();
        ob_end_clean();

        return true;
    }
}
