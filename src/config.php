<?php

/**
 * Sitemap settings available in craft/config/sprout.php
 *
 * This file does nothing on its own. It provides documentation of the
 * default value for each config setting and provides an example of how to
 * override each setting in 'craft/config/sprout.php`
 *
 * To override default settings, copy the settings you wish to implement to
 * your 'craft/config/sprout.php' config file and make your changes there.
 *
 * Config settings files are multi-environment aware so you can have different
 * settings groups for each environment, just as you do for 'general.php'
 */
return [
    'sprout' => [
        'sitemaps' => [
            // The number of items that display on each page of your sitemap.
            'totalElementsPerSitemap' => 500,

            // Generate a single, multilingual sitemap.xml file for each Site Group.
            'enableMultilingualSitemaps' => false,

            // Add a section on the Sitemaps tab to manage Custom Pages that exist
            // outside of any URL-Enabled Sections.
            'enableCustomSections' => false,
        ],
    ],
];
