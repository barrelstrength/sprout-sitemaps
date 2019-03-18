<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\migrations;

use Craft;

use craft\db\Migration;
use barrelstrength\sproutsitemaps\models\Settings;
use craft\services\Plugins;

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
        $this->createTables();
        $this->insertDefaultSettings();

        return true;
    }

    /**
     * @return bool|void
     * @throws \Throwable
     */
    public function safeDown()
    {
        $this->dropTable('{{%sproutseo_sitemaps}}');
    }

    // Protected Methods
    // =========================================================================

    protected function createTables()
    {
        $table = '{{%sproutseo_sitemaps}}';

        if (!$this->db->tableExists($table)) {
            $this->createTable($table, [
                'id' => $this->primaryKey(),
                'siteId' => $this->integer()->notNull(),
                'uniqueKey' => $this->string(),
                'urlEnabledSectionId' => $this->integer(),
                'enabled' => $this->boolean()->defaultValue(false),
                'type' => $this->string(),
                'uri' => $this->string(),
                'priority' => $this->decimal(11, 1),
                'changeFrequency' => $this->string(),
                'dateCreated' => $this->dateTime()->notNull(),
                'dateUpdated' => $this->dateTime()->notNull(),
                'uid' => $this->uid(),
            ]);

            $this->createIndexes();
            $this->addForeignKeys();
        }
    }

    protected function createIndexes()
    {
        $this->createIndex(null, '{{%sproutseo_sitemaps}}', ['siteId']);
    }

    protected function addForeignKeys()
    {
        $this->addForeignKey(null, '{{%sproutseo_sitemaps}}', ['siteId'], '{{%sites}}', ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * @throws \craft\errors\SiteNotFoundException
     * @throws \yii\base\ErrorException
     * @throws \yii\base\Exception
     * @throws \yii\base\NotSupportedException
     * @throws \yii\web\ServerErrorHttpException
     */
    protected function insertDefaultSettings()
    {
        $settings = new Settings();
        // default site id for sections
        $site = Craft::$app->getSites()->getPrimarySite();
        $settings->siteSettings[$site->id] = $site->id;

        // Add our default plugin settings
        $pluginHandle = 'sprout-sitemaps';
        $projectConfig = Craft::$app->getProjectConfig();
        $projectConfig->set(Plugins::CONFIG_PLUGINS_KEY.'.'.$pluginHandle.'.settings', $settings->toArray());
    }
}
