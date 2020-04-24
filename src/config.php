<?php

/**
 * Sprout Sitemaps config.php
 *
 * This file exists only as a template for the Sprout Sitemaps settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'sprout-sitemaps.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

return [
    // The name to display in the control panel in place of the plugin name
    'pluginNameOverride' => 'Sprout Sitemaps',

    // Output a dynamic XML sitemap of all pages in your URL-Enabled Sections.
    'enableDynamicSitemaps' => true,

    // The number of items that display on each page of your sitemap.
    'totalElementsPerSitemap' => 500,

    // Generate a single, multilingual sitemap.xml file for each Site Group.
    'enableMultilingualSitemaps' => false,

    // Add a section on the Sitemaps tab to manage Custom Pages that exist
    // outside of any URL-Enabled Sections.
    'enableCustomSections' => false
];
