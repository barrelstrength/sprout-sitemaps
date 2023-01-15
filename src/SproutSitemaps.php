<?php

namespace BarrelStrength\SproutSitemaps;

use BarrelStrength\Sprout\core\db\MigrationHelper;
use BarrelStrength\Sprout\core\db\SproutPluginMigrationInterface;
use BarrelStrength\Sprout\core\db\SproutPluginMigrator;
use BarrelStrength\Sprout\core\editions\Edition;
use BarrelStrength\Sprout\core\modules\Modules;
use BarrelStrength\Sprout\sitemaps\SitemapsModule;
use BarrelStrength\Sprout\uris\UrisModule;
use Craft;
use craft\base\Plugin;
use craft\db\MigrationManager;
use craft\errors\MigrationException;
use craft\events\RegisterComponentTypesEvent;
use craft\helpers\UrlHelper;
use yii\base\Event;
use yii\base\InvalidConfigException;

class SproutSitemaps extends Plugin implements SproutPluginMigrationInterface
{
    public string $minVersionRequired = '1.3.0';

    public string $schemaVersion = '0.0.1';

    /**
     * @inheritDoc
     */
    public static function editions(): array
    {
        return [
            Edition::LITE,
            Edition::PRO,
        ];
    }

    public static function getSchemaDependencies(): array
    {
        return [
            SitemapsModule::class,
            UrisModule::class,
        ];
    }

    /**
     * @throws InvalidConfigException
     */
    public function getMigrator(): MigrationManager
    {
        return SproutPluginMigrator::make($this);
    }

    public function init(): void
    {
        parent::init();

        Event::on(
            Modules::class,
            Modules::EVENT_REGISTER_SPROUT_AVAILABLE_MODULES,
            static function(RegisterComponentTypesEvent $event) {
                $event->types[] = SitemapsModule::class;
            }
        );

        $this->instantiateSproutModules();
        $this->grantModuleEditions();
    }

    protected function instantiateSproutModules(): void
    {
        SitemapsModule::isEnabled() && SitemapsModule::getInstance();
    }

    protected function grantModuleEditions(): void
    {
        if ($this->edition === Edition::PRO) {
            SitemapsModule::isEnabled() && SitemapsModule::getInstance()->grantEdition(Edition::PRO);
        }
    }

    /**
     * @throws MigrationException
     */
    protected function afterInstall(): void
    {
        MigrationHelper::runMigrations($this);

        if (Craft::$app->getRequest()->getIsConsoleRequest()) {
            return;
        }

        // Redirect to welcome page
        $url = UrlHelper::cpUrl('sprout/welcome/sitemaps');
        Craft::$app->getResponse()->redirect($url)->send();
    }

    /**
     * @throws MigrationException
     * @throws InvalidConfigException
     */
    protected function beforeUninstall(): void
    {
        MigrationHelper::runUninstallMigrations($this);
    }
}
