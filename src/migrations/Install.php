<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\migrations;

use barrelstrength\sproutbase\base\SproutDependencyInterface;
use barrelstrength\sproutbase\migrations\Install as SproutBaseInstall;
use barrelstrength\sproutbasesitemaps\migrations\Install as SproutBaseSitemapsInstall;
use barrelstrength\sproutsitemaps\SproutSitemaps;
use craft\db\Migration;
use craft\errors\SiteNotFoundException;
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
     * @throws SiteNotFoundException
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

    /**
     * @return bool
     * @throws Throwable
     */
    public function safeDown(): bool
    {
        /** @var SproutSitemaps $plugin */
        $plugin = SproutSitemaps::getInstance();

        $sproutBaseSitemapsInUse = $plugin->dependencyInUse(SproutDependencyInterface::SPROUT_BASE_SITEMAPS);
        $sproutBaseInUse = $plugin->dependencyInUse(SproutDependencyInterface::SPROUT_BASE);

        if (!$sproutBaseSitemapsInUse) {
            $migration = new SproutBaseSitemapsInstall();

            ob_start();
            $migration->safeDown();
            ob_end_clean();
        }

        if (!$sproutBaseInUse) {
            $migration = new SproutBaseInstall();

            ob_start();
            $migration->safeDown();
            ob_end_clean();
        }

        return true;
    }
}
