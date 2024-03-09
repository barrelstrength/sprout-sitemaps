<?php

namespace BarrelStrength\SproutSitemaps\migrations;

use BarrelStrength\Sprout\core\db\m000000_000000_sprout_plugin_migration;
use BarrelStrength\Sprout\core\db\SproutPluginMigrationInterface;
use BarrelStrength\SproutSitemaps\SproutSitemaps;

class m240309_034136_schema_4_45_0 extends m000000_000000_sprout_plugin_migration
{
    public function getPluginInstance(): SproutPluginMigrationInterface
    {
        return SproutSitemaps::getInstance();
    }
}