<?php
/**
 * @link      https://sprout.barrelstrengthdesign.com/
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license   http://sprout.barrelstrengthdesign.com/license
 */

namespace barrelstrength\sproutsitemaps\controllers;


use barrelstrength\sproutsitemaps\models\Settings;
use barrelstrength\sproutsitemaps\SproutSitemaps;
use craft\web\Controller;

use Craft;
use yii\web\HttpException;


/**
 * Class XmlSitemapController
 */
class XmlSitemapController extends Controller
{
    /**
     * @inheritdoc
     */
    public $allowAnonymous = ['render-xml-sitemap'];

    /**
     * Generates an XML sitemapindex or sitemap
     *
     * @param null     $sitemapKey
     * @param int|null $pageNumber
     *
     * @return \yii\web\Response
     * @throws \craft\errors\SiteNotFoundException
     * @throws \yii\base\Exception
     */
    public function actionRenderXmlSitemap($sitemapKey = null, int $pageNumber = null)
    {
        $siteId = Craft::$app->sites->getCurrentSite()->id;
        $multiSiteSiteIds = [];
        $sitesInGroup = [];

        /**
         * @var Settings $pluginSettings
         */
        $pluginSettings = Craft::$app->plugins->getPlugin('sprout-sitemaps')->getSettings();
        $isMultilingualSitemap = $pluginSettings->enableMultilingualSitemaps;

        if (Craft::$app->getIsMultiSite() && $isMultilingualSitemap) {
            $sitesInGroup = SproutSitemaps::$app->xmlSitemap->getCurrentSitemapSites();
            $firstSiteInGroup = $sitesInGroup[0];

            // Only render sitemaps for the primary site in a group
            if ($siteId !== $firstSiteInGroup->id) {
                throw new HttpException(404);
            }

            foreach ($sitesInGroup as $siteInGroup) {
                $multiSiteSiteIds[] = (int)$siteInGroup->id;
            }
        }

        $sitemapIndexUrls = [];
        $elements = [];

        switch ($sitemapKey) {
            // Generate Sitemap Index
            case '':
                $sitemapIndexUrls = SproutSitemaps::$app->xmlSitemap->getSitemapIndex($siteId);
                break;

            // Prepare Singles Sitemap
            case 'singles':
                $elements = SproutSitemaps::$app->xmlSitemap->getDynamicSitemapElements('singles', $pageNumber, $siteId);
                break;

            // Prepare Custom Pages Sitemap
            case 'custom-pages':
                if (count($multiSiteSiteIds)) {
                    $elements = SproutSitemaps::$app->xmlSitemap->getCustomSectionUrlsForMultipleIds($multiSiteSiteIds, $sitesInGroup);
                } else {
                    $elements = SproutSitemaps::$app->xmlSitemap->getCustomSectionUrls($siteId);
                }

                break;

            // Prepare URL-Enabled Section Sitemap
            default:
                $elements = SproutSitemaps::$app->xmlSitemap->getDynamicSitemapElements($sitemapKey, $pageNumber, $siteId);
        }

        $headers = Craft::$app->getResponse()->getHeaders();
        $headers->set('Content-Type', 'application/xml');

        $templatePath = Craft::getAlias('@sproutsitemaps/templates/');
        Craft::$app->view->setTemplatesPath($templatePath);

        // Render a specific sitemap
        if ($sitemapKey) {
            return $this->renderTemplate('_components/sitemaps/sitemap', [
                'elements' => $elements
            ]);
        }

        // Render the sitemapindex if no specific sitemap is defined
        return $this->renderTemplate('_components/sitemaps/sitemapindex', [
            'sitemapIndexUrls' => $sitemapIndexUrls
        ]);
    }
}
